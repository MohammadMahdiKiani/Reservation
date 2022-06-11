<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EditPassword extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('UserEditPassword');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $valid = $request->validate([
            'password'  => 'required|min:8',
            'newpassword'  => 'required|min:8',
            'renewpassword'  => 'required|min:8'
        ]);
        
        
         if (password_verify($valid['password'],Auth::user()->password)) {
             if ($valid['newpassword']==$valid['renewpassword']) {

                 $newPassword = Hash::make($valid['newpassword']);
                 $user = User::where('phone_number',Auth::user()->phone_number)->update(['password' => $newPassword]);

                 return redirect('user-dashboard')->with('success','رمز عبور با موفقیت تغییر کرد');
             }
             else{
               return redirect('/user-dashboard/edit-password')->with('danger','مقادیر تکرار رمز عبور صحیح نبود');
             }
         }
         else{
            return redirect('/user-dashboard/edit-password')->with('danger','رمز عبور فعلی صحیح نبود');
         }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
