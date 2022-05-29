@extends('layout.UserDashboardMaster');
@if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                    
 @endif
@if (session('danger'))
    <div class="alert alert-danger">{{session('danger')}}</div>
                    
    @endif
@error('message')
    <div class="alert alert-danger">{{$message}}</div>
 @enderror
@section('content')
    <h4 style="padding: 5px; margin: 30px;">صفحه تغییر اطلاعات کاربری:</h4>

    <form action="{{route('editUser')}}" method="post">
        @csrf
        <x-input value="{{Auth::user()->first_name}}" placeholder="نام به صورت انگلیسی وارد شود" type="text" name="first_name">
            {{ __('label.first_name') }}
        </x-input>

        <x-input value="{{Auth::user()->last_name}}" placeholder="نام خانوادگی به صورت انگلیسی وارد شود" type="text" name="last_name">
            {{ __('label.last_name') }}
        </x-input>

        <x-input class="form-control-plaintext" value="{{Auth::user()->phone_number}}" placeholder="شماره موبایل باید 11 رقم باشد" type="tel" name="phone_number" readonly>
            {{ __('label.phone_number') }}
        </x-input>

        <x-input class="form-control-plaintext" value="{{Auth::user()->email}}"  type="email" name="email">
            {{ __('label.email') }}
        </x-input>
        
        <button class="btn btn-success" type="submit" name="submit">{{ __('button.submit') }}</button>
    </form>
@endsection