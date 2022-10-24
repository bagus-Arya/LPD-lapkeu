<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoAkun extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_akun',
        'akun_types',
        'no_akun',
    ];
}
