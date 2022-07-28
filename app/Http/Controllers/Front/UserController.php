<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Gym;
use App\Models\Gymsimage;
use App\Models\Reserved;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function ShowGyms()
    {
       $gyms = Gym::orderBy('id','DESC')->get(); 
       $gymimages = Gymsimage::all();
       return view('UserGyms',compact('gyms','gymimages'));
    }
    public function IndexShowGym(Request $request,$id)
    {
        $gym = Gym::find($id);
        $gymimage = Gymsimage::where('gyms_id',$id)->get();
        $gymimage->toArray();
        return view('UserGymDetail',compact('gym','gymimage'));
    }
    public function IndexReserv(Request $request)
    {
        if (Auth::check()) {
            $gym_id = $request->gym_id;
            $gym = Gym::find($gym_id);
            $datetime = explode(" ",$request->radio);
            
            return view('UserReservDetail',compact('datetime','gym')); 
        }
        else{
            return redirect('/login')->with('primary','جهت رزرو سالن، ابتدا وارد شويد');
        }
        
    }
    public function Reserv(Request $request)
    {
        $result = $results = Reserved::where('day', $request->day)->Where('start_time', $request->start_time)->Where('end_time',$request->end_time)->count();
        
        if ($result==1) {
            return redirect()->route('user.gymdetail', ['id' => $request->gym_id])->with('danger','سانس انتخابی قبلا توسط شخص دیگری رزرو شده است. لطفا سانس دیگری را انتخاب کنید');
        }
        else{
            $reserv_code = rand(100000, 999999);
            $gym = Gym::find($request->gym_id);
            $reserved = Reserved::create([
            'gyms_id'    => $request->gym_id,
            'user_id'     => Auth::user()->id,
            'day'     => $request->day,
            'start_time'=>$request->start_time,
            'end_time'=>$request->end_time,
            'reserv_code'=>$reserv_code
            
            
        ]);
        if ($reserved==true) {
            return view('UserReserved',compact('reserved','gym'))->with('success','رزرو سالن با موفقیت انجام شد');
        }
        }
        
    }
    public function ShowReserved(Request $request)
    {
         $reserved = Reserved::where('user_id',Auth::user()->id)->get();
         
         $i = 0;
         $gym = array();
         foreach ($reserved as $r ) {
            $gym[$i] = Gym::where('id',$r['gyms_id'])->get();
            $i++;
         }
        
        $i = 0;
         return view('UserShowReserved',compact('reserved','gym','i'));
    }
}
