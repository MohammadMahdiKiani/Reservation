<?php

namespace App\Http\Controllers\Admin;

use App\Models\Gym;
use App\Models\Gymsimage;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Container\Container;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\File;

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
    public function IndexGyms()
    {
        return view('AdminGyms');
    }
    public function ShowGyms()
    {
        $gyms = Gym::orderBy('id','DESC')->get();

        return view('AdminGyms',compact('gyms'));
    }
    public function IndexAddGym()
    {
        return view('AdminAddGym');
    }
    public function AddGym(Request $request)
    {
        
        $valid = $request->validate([
            'name'    => 'required|unique:gyms,phone_number',
            'address'     => 'required|min:10',
            'phone_number'     => 'required|digits:11|unique:gyms,phone_number',
            'GenderList'=>'',
            'football'=>'',
            'volleyball'=>'',
            'basketball'=>'',
            'handball'=>'',
            'locker_room'=>'',
            'drinking_water'=>'',
            'bathroom'=>'',
            'image1'=>'mimes:jpg,png,jpeg',
            'image2'=>'mimes:jpg,png,jpeg|max:5048',
            'image3'=>'mimes:jpg,png,jpeg|max:5048'
        ]);

       $image1 = time().'-'.$valid['name'].'.'.$request->file('image1')->guessClientExtension();
       
       if (isset($valid['image2']) && !empty($valid['image2'])) {
        $image2 = time().'-'.$valid['name'].'2'.'.'.$request->file('image2')->guessClientExtension();

       }if (isset($valid['image3']) && !empty($valid['image3'])) {
        $image3 = time().'-'.$valid['name'].'3'.'.'.$request->file('image3')->guessClientExtension();

       }
        
        if (isset($valid['football'])) {
            $valid['football']='1';
        }
        else{
            $valid['football']='0';
        }
        if (isset($valid['volleyball'])) {
            $valid['volleyball']='1';
        }
        else{
            $valid['volleyball']='0';
        }
        if (isset($valid['basketball'])) {
            $valid['basketball']='1';
        }
        else{
            $valid['basketball']='0';
        }
        if (isset($valid['handball'])) {
            $valid['handball']='1';
        }
        else{
            $valid['handball']='0';
        }
        if (isset($valid['locker_room'])) {
            $valid['locker_room']='1';
        }
        else{
            $valid['locker_room']='0';
        }
        if (isset($valid['drinking_water'])) {
            $valid['drinking_water']='1';
        }
        else{
            $valid['drinking_water']='0';
        }
        if (isset($valid['bathroom'])) {
            $valid['bathroom']='1';
        }
        else{
            $valid['bathroom']='0';
        }
        
        $gym = Gym::create([
            'name'    => $valid['name'],
            'address'     => $valid['address'],
            'phone_number'     => $valid['phone_number'],
            'gender'=>$valid['GenderList'],
            'football'=>$valid['football'],
            'volleyball'=>$valid['volleyball'],
            'basketball'=>$valid['basketball'],
            'handball'=>$valid['handball'],
            'locker_room'=>$valid['locker_room'],
            'drinking_water'=>$valid['drinking_water'],
            'bathroom'=>$valid['bathroom']
        ]);
        if ($gym==true) {
            
            if (isset($image1) && !empty($image1)) {
                
                $save = $request->image1->move(public_path('images'),$image1);
                
                $img = Gymsimage::create([
                    'gyms_id'=>$gym->id,
                    'src'=>$image1  
                ]);
            }
            if (isset($image2) && !empty($image2)) {
                $save = $request->image2->move(public_path('images'),$image2);
                $img = Gymsimage::create([
                    'gyms_id'=>$gym->id,
                    'src'=>$image2  
                ]);
            }
            if (isset($image3) && !empty($image3)) {
                $save = $request->image3->move(public_path('images'),$image3);
                $img = Gymsimage::create([
                    'gyms_id'=>$gym->id,
                    'src'=>$image3  
                ]);
            }
        }
        return redirect('/admin-dashboard/gyms')->with('success','اطلاعات با موفقيت ذخيره شد');
    }
    
    public function IndexEditGym(Gym $gym ,Gymsimage $gymimage, Request $request)
    {
        $gym = Gym::find($request->id);
        $gymimage = Gymsimage::where('gyms_id',$request->id)->get();
        return view('AdminEditGym',compact('gym','gymimage'));
    }

    public function EditGym(Request $request,$id)
    {
        $gym = Gym::find($id);

        $gymimage = Gymsimage::where('gyms_id',$id)->get();
        $gymimage->toArray();
        
        
        //dd($destination);
        $valid = $request->validate([
            'name'    => 'required',
            'address'     => 'required|min:10',
            'phone_number'     => ['required',
                                 'digits:11',Rule::unique('gyms','phone_number')->ignore($id)],
            'GenderList'=>'',
            'football'=>'',
            'volleyball'=>'',
            'basketball'=>'',
            'handball'=>'',
            'locker_room'=>'',
            'drinking_water'=>'',
            'bathroom'=>'',
            'image1'=>'mimes:jpg,png,jpeg',
            'image2'=>'mimes:jpg,png,jpeg|max:5048',
            'image3'=>'mimes:jpg,png,jpeg|max:5048'
        ]);
        if (isset($valid['image1']) && !empty($valid['image1'])) {
       $image1 = time().'-'.$valid['name'].'.'.$request->file('image1')->guessClientExtension();
        }
       if (isset($valid['image2']) && !empty($valid['image2'])) {
        $image2 = time().'-'.$valid['name'].'2'.'.'.$request->file('image2')->guessClientExtension();

       }if (isset($valid['image3']) && !empty($valid['image3'])) {
        $image3 = time().'-'.$valid['name'].'3'.'.'.$request->file('image3')->guessClientExtension();

       }
        
        if (isset($valid['football'])) {
            $valid['football']='1';
        }
        else{
            $valid['football']='0';
        }
        if (isset($valid['volleyball'])) {
            $valid['volleyball']='1';
        }
        else{
            $valid['volleyball']='0';
        }
        if (isset($valid['basketball'])) {
            $valid['basketball']='1';
        }
        else{
            $valid['basketball']='0';
        }
        if (isset($valid['handball'])) {
            $valid['handball']='1';
        }
        else{
            $valid['handball']='0';
        }
        if (isset($valid['locker_room'])) {
            $valid['locker_room']='1';
        }
        else{
            $valid['locker_room']='0';
        }
        if (isset($valid['drinking_water'])) {
            $valid['drinking_water']='1';
        }
        else{
            $valid['drinking_water']='0';
        }
        if (isset($valid['bathroom'])) {
            $valid['bathroom']='1';
        }
        else{
            $valid['bathroom']='0';
        }

        $gym->name = $valid['name'];
        $gym->address = $valid['address'];
        $gym->phone_number = $valid['phone_number'];
        $gym->Gender = $valid['GenderList'];
        $gym->football = $valid['football'];
        $gym->volleyball = $valid['volleyball'];
        $gym->basketball = $valid['basketball'];
        $gym->handball = $valid['handball'];
        $gym->locker_room = $valid['locker_room'];
        $gym->drinking_water = $valid['drinking_water'];
        $gym->bathroom = $valid['bathroom'];

        $gym->save();
        // if ($gym==true) {
        //     return redirect('/admin-dashboard/gyms')->with('success','اطلاعات با موفقيت ویرایش شد');
        // }
        // else{
        //     return redirect('/admin-dashboard/gyms')->with('danger','خطا در ویرایش اطلاعات');
        // }
        if ($gym==true) {
            
            if (isset($image1) && !empty($image1)) {
                if (!empty($gymimage[0])) {
                    $destination = 'images/'.$gymimage[0]['src'];
                    if(File::exists($destination)){
                    File::delete($destination);
                    }
                    $save = $request->image1->move(public_path('images'),$image1);
                    Gymsimage::where('id', $gymimage[0]['id'])->update(['src' => $image1]);
                }
                else {
                    $save = $request->image1->move(public_path('images'),$image1);
                    $img = Gymsimage::create([
                    'gyms_id'=>$gym->id,
                    'src'=>$image1  
                ]);
                }

                
                // $img = Gymsimage::create([
                //     'gyms_id'=>$gym->id,
                //     'src'=>$image1  
                // ]);
            }
            if (isset($image2) && !empty($image2)) {
                if (!empty($gymimage[1])) {
                    $destination = 'images/'.$gymimage[1]['src'];
                    if(File::exists($destination)){
                    File::delete($destination);
                    }
                    $save = $request->image2->move(public_path('images'),$image2);
                    Gymsimage::where('id', $gymimage[1]['id'])->update(['src' => $image2]);
                }
                else {
                    $save = $request->image2->move(public_path('images'),$image2);
                    $img = Gymsimage::create([
                    'gyms_id'=>$gym->id,
                    'src'=>$image2  
                ]);
                }
            }
            if (isset($image3) && !empty($image3)) {
                if (!empty($gymimage[2])) {
                    $destination = 'images/'.$gymimage[2]['src'];
                    if(File::exists($destination)){
                    File::delete($destination);
                    }
                    $save = $request->image3->move(public_path('images'),$image3);
                    Gymsimage::where('id', $gymimage[2]['id'])->update(['src' => $image3]);
                }
                else {
                    $save = $request->image3->move(public_path('images'),$image3);
                    $img = Gymsimage::create([
                    'gyms_id'=>$gym->id,
                    'src'=>$image3  
                ]);
                }
            }
        
        }
        return redirect('/admin-dashboard/gyms')->with('success','اطلاعات با موفقيت ویرایش شد');

    }


    public function IndexDestroyGym(Request $request)
    {
        
        $gym = Gym::find($request->id);
        $gymimage = Gymsimage::where('gyms_id',$request->id)->get()->toArray();
       

        for ($i=0; $i < count($gymimage) ; $i++) { 
            $destination = 'images/'.$gymimage[$i]['src'];
                if(File::exists($destination)){
                    
                    File::delete($destination);
                    
                }
        }
        $status = $gym->delete();
        
        if($status == true)
            return redirect('/admin-dashboard/gyms')->with('danger','حذف انجام شد');
            else
            return redirect('/admin-dashboard/gyms')->with('danger','حذف انجام نشد');
    }
    public function ImageDelete(Gymsimage $gymimage = null,Request $request)
    {
        $gymimage = Gymsimage::find($request->id);
        
        $destination = 'images/'.$gymimage->src;
                if(File::exists($destination)){
                    
                    File::delete($destination);
                }
        $gymimage->delete();
        return redirect()->back();

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
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
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
