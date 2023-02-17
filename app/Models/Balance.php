<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
    ];

    public $timestamps = false;

    public function deposit(float $value): array
    {
        $amount = $this->amount ?? 0;
        $total_before = $amount;
        $total_after = $amount + $value;
        $this->amount = $total_after;

        $deposit = $this->save();

        $historic = auth()->user()->historics()->create([
            'type'          => 'I',
            'amount'        => $amount,
            'total_before'  => $total_before,
            'total_after'   => $total_after,
            'date'          => date('Y-m-d'),
        ]);

        if (!$deposit || !$historic) {
            return [
                'success' => false,
                'message' => 'Falha ao recarregar',
            ];
        }

        return [
            'success' => true,
            'message' => 'Sucesso ao recarregar',
        ];
    }
}
