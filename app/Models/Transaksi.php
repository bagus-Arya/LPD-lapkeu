<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_akun_id',
        'keterangan',
        'jumlah',
        'konfirmasi',
    ];

    public function akun()
    {
        return $this->hasOne(NoAkun::class, 'id', 'no_akun_id');
    }
}
