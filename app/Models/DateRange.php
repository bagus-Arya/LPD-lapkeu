<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DateRange extends Model
{
    use HasFactory;
    protected $table = 'date_range';
    protected $fillable = [
        'start',
        'end',
        'start_mutasi',
        'end_mutasi',
    ];
 
}
