@extends('layout.AdminDashboardMaster');
@if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                    
 @endif
@if (session('danger'))
    <div class="alert alert-danger">{{session('danger')}}</div>
                    
    @endif
@error('message')
    <div class="alert alert-danger">{{$message}}</div>
 @enderror
 @section('title')
     مدیریت کاربران
 @endsection
@section('content')
<div class="dataTable-container"><table id="datatablesSimple" class="dataTable-table">
    <table id="datatablesSimple" class="dataTable-table">
        
    <thead>
        <tr><th style="width: 19.5777%;">#</th><th style="width: 19.5777%;">نام</th><th style="width: 28.9827%;">نام خانوادگی</th><th style="width: 9.21305%;">شماره موبایل</th><th style="width: 15.1631%;">ایمیل</th><th style="width: 11.4203%;">وضعیت</th><th style="width: 11.4203%;">نقش</th></tr>
    </thead>
    
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>
                        {{$user->id}}
                    </td>
                    <td>
                        {{$user->first_name}}
                    </td>
                    <td>
                        {{$user->last_name}}
                    </td>
                    <td>
                        {{$user->phone_number}}
                    </td>
                    <td>
                        {{$user->email}}
                    </td>
                    <td>
                        @if ($user->active=='1')
                            @if (!($user->role=='1'))
                            فعال <a style="margin:10%; " href="{{route('admin.inactive',$user->id)}}" class="btn btn-danger">غیر فعال</a>
   
                            @else
                            فعال
                            @endif
                            
                        @endif
                        @if ($user->active=='0')
                            @if (!($user->role=='1'))
                                غیر فعال <a style="margin: 10%;" href="{{route('admin.active',$user->id)}}" class="btn btn-success">فعال</a>
                            @else
                            غیرفعال
                            @endif
                        
                        @endif
                    </td>
                    <td>
                        @if ($user->role=='1')
                            مدیر
                        @endif
                        @if ($user->role=='0')
                            کاربر عادی
                        @endif
                    </td>
                </tr>
            @endforeach
            {{-- <tr><td>Tiger Nixon</td><td>System Architect</td><td>Edinburgh</td><td>61</td><td>2011/04/25</td><td>$320,800</td></tr>
            <tr><td>Garrett Winters</td><td>Accountant</td><td>Tokyo</td><td>63</td><td>2011/07/25</td><td>$170,750</td></tr>
            <tr><td>Ashton Cox</td><td>Junior Technical Author</td><td>San Francisco</td><td>66</td><td>2009/01/12</td><td>$86,000</td></tr>
            <tr><td>Cedric Kelly</td><td>Senior Javascript Developer</td><td>Edinburgh</td><td>22</td><td>2012/03/29</td><td>$433,060</td></tr>
            <tr><td>Airi Satou</td><td>Accountant</td><td>Tokyo</td><td>33</td><td>2008/11/28</td><td>$162,700</td></tr>
            <tr><td>Brielle Williamson</td><td>Integration Specialist</td><td>New York</td><td>61</td><td>2012/12/02</td><td>$372,000</td></tr>
            <tr><td>Herrod Chandler</td><td>Sales Assistant</td><td>San Francisco</td><td>59</td><td>2012/08/06</td><td>$137,500</td></tr>
            <tr><td>Rhona Davidson</td><td>Integration Specialist</td><td>Tokyo</td><td>55</td><td>2010/10/14</td><td>$327,900</td></tr><tr><td>Colleen Hurst</td><td>Javascript Developer</td><td>San Francisco</td><td>39</td><td>2009/09/15</td><td>$205,500</td></tr>
            <tr><td>Sonya Frost</td><td>Software Engineer</td><td>Edinburgh</td><td>23</td><td>2008/12/13</td><td>$103,600</td></tr>
       --}} </tbody> 
</table>
</div>
@endsection