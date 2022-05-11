@extends('layout.master')
<x-layout name="auth">
@section('content')
    @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                    
    @endif
    @if (session('danger'))
    <div class="alert alert-danger">{{session('danger')}}</div>
                    
    @endif
    @error('message')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <form action="{{route('login')}}" method="post">
        @csrf
        <x-input type="tel" name="phone_number" autofocus>
            {{ __('label.phone_number') }}
        </x-input>

        <x-input type="password" name="password" autofocus>
            {{ __('label.password') }}
        </x-input>

        <button class="btn btn-primary" type="submit" name="submit">{{ __('button.login') }}</button>
    </form>
    <a class="btn btn-link" href="{{route('forget')}}">فراموشی رمز عبور</a>
    <a class="btn btn-link" href="{{route('register')}}">ثبت نام نکردید؟ همین حالا اقدام کنید</a>
@endsection
</x-layout>
