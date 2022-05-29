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
    <h2>صفحه تغییر پسورد</h2>

    <form action="{{route('editPassword')}}" method="post">
        @csrf
        <x-input  type="password" name="password" autofocus>
            {{ __('label.password') }}
        </x-input>
        <x-input type="password" name="newpassword">
            {{ __('label.reset_password') }}
        </x-input>
        <x-input type="password" name="renewpassword">
            {{ __('label.renewpassword') }}
        </x-input>

        <button class="btn btn-success" type="submit" name="submit">{{ __('button.submit') }}</button>
    </form>
@endsection