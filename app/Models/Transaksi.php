<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $table = 'transaksi';
    protected $fillable = [
        'user_id',
        'total',
        'transaction_type',
        'ammount',
        'description',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
