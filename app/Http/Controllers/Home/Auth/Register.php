<?php

namespace App\Http\Controllers\Home\Auth;

use App\Http\Controllers\Controller;
use App\Models\VerifyCode;
use Illuminate\Http\Request;

class Register extends Controller
{
    public function index()
    {
        return view('home.auth.register');
    }


    public function register(Request $request)
    {
        $request->validate([
            'first_name'    => 'required|min:3|regex:/^[a-zA-ZÑñ\s]+$/',
            'last_name'     => 'required|min:3|regex:/^[a-zA-ZÑñ\s]+$/',
            'phone_number'  => 'required|digits:11|unique:users,phone_number',
            'password'      => 'required|min:8',
        ]);

        # Create Verify Code
        $verifyCodeRow = VerifyCode::generateCode($request->get('phone_number'));

        # TODO send Verification Code
        $data = $request->all(['phone_number', 'first_name', 'last_name', 'password']);
        return view('home.auth.verify')->with(compact('data'));
    }
}
