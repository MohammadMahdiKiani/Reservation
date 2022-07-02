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
 ویرایش سالن
 @endsection
@section('content')
    <h4 style="padding: 5px; margin: 30px;">ویرایش سالن</h4>

    <form action="{{route('admin.editgym', ['id'=>$gym->id])}}" method="post" enctype="multipart/form-data">
        @method('put')
        @csrf
        
        <x-input value="{{$gym->name}}" type="text" name="name">
            {{ __('label.name') }}
        </x-input>

        

        <label for="GenderList">جنسيت</label>
        
        <select style="margin: 7%;" name="GenderList">

            <option value="0" >بانوان</option>
            <option value="1" >آقایان</option>
            <option value="2" >هردو</option>
            
        </select>
        <br>
        {{-- @switch($gym->gender)
            @case(0)
                مقدار ذخیره شده از قبل: بانوان
                @break
            @case(1)
            مقدار ذخیره شده از قبل: آقایان
                @break
            @case(2)
            مقدار ذخیره شده از قبل: بانوان و آقایان
                @break
            @default
                
        @endswitch --}}
<br>
        <label for="address">آدرس</label><br>
        <textarea style="padding: 5%;margin: 5%" name="address" id="" cols="30" rows="6">{{$gym->address}}</textarea>
        <x-input value="{{$gym->phone_number}}" class="form-control-plaintext" type="tel" name="phone_number">
            {{ __('label.phone') }}
        </x-input>
        <label style="margin: 2%" for="">مناسب:</label><br>
        <div>
            
            <label for="">فوتبال</label>
            @if ($gym->football=='0')
            <input type="checkbox" name="football">
            @endif
            @if ($gym->football=='1')
            <input type="checkbox" name="football" checked>
            @endif
            
            <label for="">واليبال</label>
            @if ($gym->volleyball=='0')
            <input type="checkbox" name="volleyball">
            @endif
            @if ($gym->volleyball=='1')
            <input type="checkbox" name="volleyball" checked>
            @endif
           
            <label for="">بسکتبال</label>
            @if ($gym->basketball=='0')
            <input type="checkbox" name="basketball">
            @endif
            @if ($gym->basketball=='1')
            <input type="checkbox" name="basketball" checked>
            @endif
            <label for="">هندبال</label>
            @if ($gym->handball=='0')
            <input type="checkbox" name="handball">
            @endif
            @if ($gym->handball=='1')
            <input type="checkbox" name="handball" checked>
            @endif
        </div>
        <label style="margin: 2%" for="">امكانات:</label><br>
        <div>
            <label for="">رختكن</label>
            @if ($gym->locker_room=='0')
            <input type="checkbox" name="locker_room">
            @endif
            @if ($gym->locker_room=='1')
            <input type="checkbox" name="locker_room" checked>
            @endif
            <label for="">آبخوري</label>
            @if ($gym->drinking_water=='0')
            <input type="checkbox" name="drinking_water">
            @endif
            @if ($gym->drinking_water=='1')
            <input type="checkbox" name="drinking_water" checked>
            @endif
            <label for="">حمام</label>
            @if ($gym->bathroom=='0')
            <input type="checkbox" name="bathroom">
            @endif
            @if ($gym->bathroom=='1')
            <input type="checkbox" name="bathroom" checked>
            @endif
        </div>
        <br>
        <h3>تصاویر</h3>
        <br>
        @foreach ($gymimage as $image)
        {{-- <div class="bg-image hover-overlay ripple shadow-1-strong rounded" data-mdb-ripple-color="light">
        <a href="{{route('admin.imagedelete',$image->id)}}">
        <img src="{{asset('images/'.$image->src)}}" class="w-100" width="200px" height="100px" /></a>
        <a href="">
        <div class="mask" style="background-color: rgba(249, 49, 84, 0.34)"></div>
        </a>
        </div> --}}
        <a href="{{route('admin.imagedelete',$image->id)}}"><img src="{{asset('images/'.$image->src)}}" class="rounded float-start" width="200px" height="100px" alt=""></a>
        @endforeach
        
        
        <input class="myfrm form-control" style="margin: 2%" type="file" name="image1">
        <input class="myfrm form-control" style="margin: 2%" type="file" name="image2">
        <input class="myfrm form-control" style="margin: 2%" type="file" name="image3">
        <button style="margin: 25%" class="btn btn-success" type="submit" name="submit">{{ __('button.submit') }}</button>
    </form>
    
@endsection