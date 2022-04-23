<?php

namespace App\Http\Controllers\Home\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use App\Models\VerifyCode;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class Forget extends Controller
{
    public function index()
    {
        return view('home.auth.forget');
    }

    public function forget(Request $request)
    {
        
        $valid = $request->validate([
            'phone_number'  => 'required|digits:11',
        ]);
        $user = User::where('phone_number',$valid['phone_number'])->get();
        
        if (!empty($user[0]['phone_number'])){
            $user = $user[0];
            $verifyCodeRow = VerifyCode::generateCode($user['phone_number']);
            
            session(['phone_number' => $user['phone_number']]);
            
            
            return view('home.auth.forgetverify')->with('message','کد تایید به شماره موبایل شما ارسال شد');
    
            
        }
        else{
            
            return view('home.auth.forget')->with('message','این شماره موبایل در سیستم وجود ندارد');
        }

    }
    public function forgetVerify(Request $request)
    {
        
        $valid = $request->validate([
            'verify_code'  => 'required|digits:6',
        ]);
        if (! VerifyCode::isValidCode($valid['verify_code'], session('phone_number')))
            return view('home.auth.forget')->with('message','کد اشتباه بود مجددا تلاش کنید');

            
        return view('home.auth.resetPassword');    
    }
    public function resetPassword(Request $request)
    {
        $valid = $request->validate([
            'password'  => 'required|min:8',
            'repassword'  => 'required|min:8'
        ]);
        
        if ($valid['password']==$valid['repassword']) {
            
            $newPassword = Hash::make($valid['password']);
            // echo session('phone_number');exit;
            $user = User::where('phone_number',session('phone_number'))->update(['password' => $newPassword]);
            
            // $affected = DB::table('user')
            //   ->where('phone_number', session('phone_number'))
            //   ->update(['password'=>$newPassword]);
            //   dd($affected);
            return redirect('login')->with('success','رمز عبور با موفقیت تغییر کرد');
        }
        else{
            return view('home.auth.forget')->with('message','رمز ورود همخوانی نداشت، مجددا تلاش کنید');
        }
    }

}
//VerifyCode::deleteCode($validatedData['phone_number']);