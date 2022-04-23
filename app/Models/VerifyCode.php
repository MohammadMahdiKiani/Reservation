<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerifyCode extends Model
{
    use HasFactory;


    protected $fillable = [
        'phone_number', 'verify_code'
    ];


    private function expiredMinute(): int
    {
        return 10;
    }


    public function scopeGenerateCode($query, string $phoneNumber)
    {
        $verifyCode = rand(100000, 999999);

        return $query->updateOrCreate(
            ['phone_number' => $phoneNumber],
            ['verify_code'  => $verifyCode]
        );
    }


    public function scopeGetActiveCode($query, string $phoneNumber)
    {
        return $query->where('phone_number', $phoneNumber)->where('updated_at', '>', now()->subMinutes($this->expiredMinute()));
    }

    public function scopeIsActiveCode($query, string $phoneNumber): bool
    {
        return !! $this->scopeGetActiveCode($query, $phoneNumber)->first();
    }


    public function scopeDeleteCode($query, $phoneNumber)
    {
        return $query->where('phone_number', $phoneNumber)->delete();
    }


    public function scopeIsValidCode($query, $verifyCode, $phoneNumber): bool
    {
        $activeCode = $query->getActiveCode($phoneNumber)->first();
        if (! isset($activeCode))
            return false;

        if ($verifyCode != $activeCode->verify_code)
            return false;

        return true;
    }


}
