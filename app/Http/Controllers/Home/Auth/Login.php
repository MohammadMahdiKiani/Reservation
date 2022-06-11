<?php

namespace App\Http\Controllers\Home\Auth;
session_start();
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class Login extends Controller

{
    public function index()
    {
        
        return view('home.auth.login');
    }


    public function login(Request $request)
    {
        $valid = $request->validate([
            'phone_number'  => 'required|digits:11',
            'password'      => 'required|min:8',
        ]);
        
        $data = User::where('phone_number',$valid['phone_number'])->get();
        
        if (!empty($data[0]['phone_number'])){
            $user = $data[0];
            
            //$valid['password'] = Hash::make($valid['password']); 
            if (password_verify($valid['password'],$user['password'])) {
                
                if($user['role']=='0'){
                    //if ($user['active']=='1') {
                        auth()->login($user);
                        return redirect('/user-dashboard');
                   // }
                    //else{
                        //return redirect('login');
                   // }
                
                }
                else{
                    auth()->login($user);
                    return redirect('/admin-dashboard');
                }
            }
            else{
                return redirect('login')->with('danger', 'شماره موبایل یا رمز عبور اشتباه است');
                
            }
            
        }
        else{
            
            return redirect('login')->with('danger' , 'شماره موبایل یا رمز عبور اشتباه است');
        }
        
        
        
        

    }
    
    public function logout()
    { 
        auth()->logout();
       return redirect('/login');
    }
}
