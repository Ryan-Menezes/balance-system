<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
    ];

    public $timestamps = false;

    public function deposit(float $value): array
    {
        DB::beginTransaction();

        $totalBefore = $this->amount ?? 0;
        $totalAfter = $totalBefore + $value;
        $this->amount = $totalAfter;

        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'          => 'I',
            'amount'        => $totalBefore,
            'total_before'  => $totalBefore,
            'total_after'   => $totalAfter,
            'date'          => date('Y-m-d'),
        ]);

        if (!$deposit || !$historic) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Falha ao recarregar',
            ];
        }

        DB::commit();

        return [
            'success' => true,
            'message' => 'Sucesso ao recarregar',
        ];
    }

    public function withdraw(float $value): array
    {
        if ($this->amount < $value) {
            return [
                'success' => false,
                'message' => 'Saldo insuficiênte',
            ];
        }

        DB::beginTransaction();

        $totalBefore = $this->amount ?? 0;
        $totalAfter = $totalBefore - $value;
        $this->amount = $totalAfter;

        $withdraw = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'          => 'O',
            'amount'        => $totalBefore,
            'total_before'  => $totalBefore,
            'total_after'   => $totalAfter,
            'date'          => date('Y-m-d'),
        ]);

        if (!$withdraw || !$historic) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Falha ao sacar',
            ];
        }

        DB::commit();

        return [
            'success' => true,
            'message' => 'Sucesso ao sacar',
        ];
    }

    public function transfer(float $value, User $sender): array
    {
        if ($this->amount < $value) {
            return [
                'success' => false,
                'message' => 'Saldo insuficiênte',
            ];
        }

        DB::beginTransaction();

        $totalBefore = $this->amount ?? 0;
        $totalAfter = $totalBefore - $value;
        $this->amount = $totalAfter;

        $transfer = $this->save();

        $senderBalance = $sender->balance()->firstOrCreate([]);
        $senderTotalBefore = $sender->amount ?? 0;
        $senderTotalAfter = $senderTotalBefore + $value;

        $senderTranfer = $senderBalance->update([
            'amount' => $senderTotalAfter,
        ]);

        $historic = auth()->user()->historics()->create([
            'type'                  => 'T',
            'amount'                => $totalBefore,
            'total_before'          => $totalBefore,
            'total_after'           => $totalAfter,
            'user_id_transaction'   => $sender->id,
            'date'                  => date('Y-m-d'),
        ]);

        $senderHistoric = $sender->historics()->create([
            'type'                  => 'I',
            'amount'                => $senderTotalBefore,
            'total_before'          => $senderTotalBefore,
            'total_after'           => $senderTotalAfter,
            'user_id_transaction'   => auth()->user()->id,
            'date'                  => date('Y-m-d'),
        ]);

        if (!$transfer || !$senderTranfer || !$historic || !$senderHistoric) {
            DB::rollBack();

            return [
                'success' => false,
                'message' => 'Falha ao transferir',
            ];
        }

        DB::commit();

        return [
            'success' => true,
            'message' => 'Sucesso ao transferir',
        ];
    }
}
