<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gymsimage extends Model
{
    use HasFactory;
    protected $fillable = [
        'gyms_id', 'src'
    ];
    public function Gyms() {
        return $this->belongsTo(App\Gyms::class);
    }
}
