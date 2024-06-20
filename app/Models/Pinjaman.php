<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Pinjaman extends Model
{
    protected $table = 'pinjaman';

    protected $fillable = [
        'id',
        'user_id',
        'no_rek',
        'tenor',
        'jumlah_pinjaman',
        'status'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
