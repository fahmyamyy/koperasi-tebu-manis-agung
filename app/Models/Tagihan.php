<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Tagihan extends Model
{
    protected $table = 'tagihan';

    protected $fillable = [
        'id',
        'pinjaman_id',
        'angsuran',
        'bunga',
        'tunggakan',
        'total_tagihan',
        'jatuh_tempo',
        'status'
    ];

    protected $casts = [
        'id' => 'string'
    ];

    public function pinjaman()
    {
        return $this->belongsTo(Pinjaman::class, 'pinjaman_id');
    }
}
