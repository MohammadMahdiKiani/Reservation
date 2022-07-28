<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reserved extends Model
{
    use HasFactory;

    protected $table = 'reserved';
    protected $fillable = [
        'gyms_id', 'user_id', 'day','start_time','end_time','reserv_code'
    ];
}
