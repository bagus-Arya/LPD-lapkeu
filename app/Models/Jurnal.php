<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurnal extends Model
{
    use HasFactory;
    protected $fillable = [
        'no_akun_id',
        'tgl_transaksi',
        'types',
        'jumlah',
    ];

    public function akun()
    {
        return $this->hasOne(NoAkun::class, 'id', 'no_akun_id');
    }
}
