<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TransactionLog extends Model
{
    protected $fillable = [
        'transaction_id',
        'user_id',
        'user_name', 
        'admin_name',
        'action',
        'before_data',
        'after_data',
    ];

    protected $casts = [
        'before_data' => 'array',
        'after_data' => 'array',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke transaksi
    public function transaction()
    {
        return $this->belongsTo(Transaction::class);
    }
}
