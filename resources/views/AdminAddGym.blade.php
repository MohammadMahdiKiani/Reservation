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
 افزودن سالن
 @endsection
@section('content')

    <h4 style="padding: 5px; margin: 30px;">افزودن سالن</h4>

    <form action="{{route('admin.addgym')}}" method="post" enctype="multipart/form-data">
        @csrf
        <x-input type="text" name="name">
            {{ __('label.name') }}
        </x-input>

        

        <label for="GenderList">جنسيت</label>
        <select style="margin: 7%;" name="GenderList">

            <option value="0" >بانوان</option>
            <option value="1" >آقایان</option>
            <option value="2" >هردو</option>
            
        </select>
<br>
        <label for="address">آدرس</label><br>
        <textarea style="padding: 5%;margin: 5%" name="address" id="" cols="30" rows="6"></textarea>
        <x-input class="form-control-plaintext" type="tel" name="phone_number">
            {{ __('label.phone') }}
        </x-input>
        <label style="margin: 2%" for="">مناسب:</label><br>
        <div>
            
            <label for="">فوتبال</label><input type="checkbox" name="football"  id="">
            <label for="">واليبال</label><input type="checkbox" name="volleyball" id="">
            <label for="">بسکتبال</label><input type="checkbox" name="basketball" id="">
            <label for="">هندبال</label><input type="checkbox" name="handball" id="">
        </div>
        <label style="margin: 2%" for="">امكانات:</label><br>
        <div>
            <label for="">رختكن</label><input type="checkbox" name="locker_room" id="">
            <label for="">آبخوري</label><input type="checkbox" name="drinking_water" id="">
            <label for="">حمام</label><input type="checkbox" name="bathroom" id="">
        </div>
        <input class="myfrm form-control" style="margin: 2%" type="file" name="image1">
        <input class="myfrm form-control" style="margin: 2%" type="file" name="image2">
        <input class="myfrm form-control" style="margin: 2%" type="file" name="image3">
        <x-input type="text" name="price" placeholder="قیمت به تومان وارد شود">
            {{ __('label.price') }}
        </x-input>
        <button style="margin: 25%" class="btn btn-success" type="submit" name="submit">{{ __('button.submit') }}</button>
    </form>
@endsection