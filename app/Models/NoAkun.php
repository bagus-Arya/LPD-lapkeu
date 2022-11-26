<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoAkun extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_akun',
        'no_akun',
    ];

    // public function transaksi()
    // {
    //     return $this->belongsTo(Transaksi::class, 'no_akun', 'no_akun_id');
    // }
}
