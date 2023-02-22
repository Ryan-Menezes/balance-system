<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Historic extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'amount',
        'total_before',
        'total_after',
        'user_id_transaction',
        'date',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function type($type = null)
    {
        $types = [
            'I' => 'Entrada',
            'O' => 'Saída',
            'T' => 'Tranferência',
        ];

        if ($this->user_id_transaction !== null && $type === 'I') {
            return 'Recebido';
        }

        return $types[$type] ?? $types;
    }

    public function getDateAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function userSender()
    {
        return $this->belongsTo(User::class, 'user_id_transaction');
    }

    public function search(array $data, int $totalPage = 10)
    {
        return $this
            ->where('user_id', auth()->user()->id)
            ->where(function ($query) use ($data) {
                if (isset($data['id'])) {
                    $query->where('id', $data['id']);
                }

                if (isset($data['date'])) {
                    $query->where('date', $data['date']);
                }

                if (isset($data['type'])) {
                    $query->where('type', $data['type']);
                }
            })
            ->paginate($totalPage);
    }
}
