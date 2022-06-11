<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Container
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AdminDashboard');
    }
    public function AllUsers()
    {
        $users = User::orderBy('id','DESC')->get();
        return view('AdminUsers',compact('users'));
    }
    public function InActive(Request $request)
    {
        $user = User::where('id',$request->id)->update(['active' =>'0']);
        $users = User::orderBy('id','DESC')->get();
        if ($user==true) {
            
            return view('adminusers',compact('users'))->with('success','کاربر غیرفعال شد');
        }
        else{
            return view('adminusers',compact('users'))->with('danger','کاربر غیرفعال نشد');
        }
    }
    public function active(Request $request)
    {
        $user = User::where('id',$request->id)->update(['active' =>'1']);
        $users = User::orderBy('id','DESC')->get();
        if ($user==true) {
            return view('adminusers',compact('users'))->with('success','کاربر فعال شد');
        }
        else{
            return view('adminusers',compact('users'))->with('danger','کاربر فعال نشد');
        }
    }
    public function IndexEditUser()
    {
        return view('AdminEditUser');
    }

    public function EditUser(Request $request)
    {
        $valid = $request->validate([
            'first_name'    => 'required|min:3|regex:/^[a-zA-ZÑñ\s]+$/',
            'last_name'     => 'required|min:3|regex:/^[a-zA-ZÑñ\s]+$/',
            'email'     => 'required',
        ]);

        $user = User::where('phone_number',Auth::user()->phone_number)->update(['first_name' =>$valid['first_name'],'last_name' =>$valid['last_name'],'email' =>$valid['email']]);
        return redirect('admin-dashboard')->with('success','اطلاعات با موفقیت تغییر کرد');
    }

    public function IndexEditPassword()
    {
        return view('AdminEditPassword');
    }

    public function EditPassword(Request $request)
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

                 return redirect('admin-dashboard')->with('success','رمز عبور با موفقیت تغییر کرد');
             }
             else{
               return redirect('/admin-dashboard/edit-password')->with('danger','مقادیر تکرار رمز عبور صحیح نبود');
             }
         }
         else{
            return redirect('/admin-dashboard/edit-password')->with('danger','رمز عبور فعلی صحیح نبود');
         }
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
    public function edit($id)
    {
        //
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
