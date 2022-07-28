<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name', 'gender', 'phone_number', 'address', 'password' ,'football', 'volleyball', 'basketball','handball', 'locker_room', 'drinking_water', 'bathroom','src','price'
    ];
   
    public function Gymsimages()
    {
        return $this->hasMany(App\Gymsimages::class);
    }
}
