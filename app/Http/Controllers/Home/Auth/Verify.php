<?php

namespace App\Http\Controllers\Home\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\VerifyCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Verify extends Controller
{
    public function verify(Request $request)
    {
        $validatedData = $request->validate([
            'first_name'    => 'required|min:3|regex:/^[a-zA-ZÑñ\s]+$/',
            'last_name'     => 'required|min:5|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone_number'  => 'required|digits:11|unique:users,phone_number',
            'password'      => 'required|min:8',
            'verify_code'   => 'required|digits:6'
        ]);

        if (! VerifyCode::isValidCode($validatedData['verify_code'], $validatedData['phone_number']))
            return redirect(route('register'));

        $user = User::create([
            'first_name' => $validatedData['first_name'],
            'last_name' => $validatedData['last_name'],
            'phone_number' => $validatedData['phone_number'],
            'password' => $validatedData['password']
        ]);

        VerifyCode::deleteCode($validatedData['phone_number']);

        auth()->login($user);

        return redirect('/');
    }
}
