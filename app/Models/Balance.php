<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Balance extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'user_id',
        'amount',
    ];

    public $timestamps = false;

    public function deposit(float $value): array
    {
        $this->amount += $value;
        $deposit = $this->save();

        if (!$deposit) {
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
