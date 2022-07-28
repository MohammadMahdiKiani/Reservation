@extends('layout.AdminDashboardMaster')
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
     مدیریت سالن ها
 @endsection
@section('content')
<div class="dataTable-container"><table id="datatablesSimple" class="dataTable-table">
    <a style="margin: 0.5%;" class="btn btn-primary" href="{{route('admin.addgym')}}">افزودن سالن</a>
    <table id="datatablesSimple" class="dataTable-table">
        
    <thead>
        <tr><th style="width: 19.5777%;">#</th><th style="width: 19.5777%;">نام سالن</th><th style="width: 28.9827%;">مناسب</th><th style="width: 9.21305%;">آدرس</th><th style="width: 15.1631%;">شماره تلفن</th><th style="width: 11.4203%;"> فوتبال</th><th style="width: 11.4203%;"> والیبال</th><th style="width: 11.4203%;"> بسکتبال</th><th style="width: 11.4203%;"> هندبال</th><th style="width: 11.4203%;">رختکن</th><th style="width: 11.4203%;">آبخوری</th><th style="width: 11.4203%;">حمام</th><th style="width: 11.4203%;">قیمت</th></tr>
    </thead>
    
        <tbody>
            @foreach ($gyms as $gym)
                <tr>
                    <td>
                        {{$gym->id}}
                    </td>
                    <td>
                        {{$gym->name}}
                    </td>
                    <td>
                        @if ($gym->gender==0)
                            بانوان
                        @endif
                        @if ($gym->gender==1)
                        آقایان
                            
                        @endif
                        @if ($gym->gender==2)
                        بانوان و آقایان
                            
                        @endif
                       
                    </td>
                    <td>
                        {{$gym->address}}
                    </td>
                    <td>
                        {{$gym->phone_number}}
                    </td>
                    <td>
                        @if ($gym->football==0)
                            ندارد
                        @endif
                        @if ($gym->football==1)
                            دارد
                        @endif
                    </td>
                    <td>
                        @if ($gym->volleyball==0)
                            ندارد
                        @endif
                        @if ($gym->volleyball==1)
                            دارد
                        @endif
                    </td>
                    <td>
                        @if ($gym->basketball==0)
                            ندارد
                        @endif
                        @if ($gym->basketball==1)
                            دارد
                        @endif
                    </td>
                    <td>
                        @if ($gym->handball==0)
                            ندارد
                        @endif
                        @if ($gym->handball==1)
                            دارد
                        @endif
                    </td>
                    <td>
                        @if ($gym->locker_room==0)
                            ندارد
                        @endif
                        @if ($gym->locker_room==1)
                            دارد
                        @endif
                    </td>
                    <td>
                        @if ($gym->drinking_water==0)
                            ندارد
                        @endif
                        @if ($gym->drinking_water==1)
                            دارد
                        @endif
                    </td>
                    <td>
                        @if ($gym->bathroom==0)
                            ندارد
                        @endif
                        @if ($gym->bathroom==1)
                            دارد
                        @endif
                    </td>
                    <td>
                        {{number_format($gym->price)}}
                    </td>
                    <td>
                       <a class="btn btn-link" href="{{route('admin.indexeditgym',$gym)}}">ویرایش</a>
                       <a class="btn btn-link" href="{{route('admin.indexdestroygym',$gym)}}">حذف</a>
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