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
    <form action="{{route('resetPassword')}}" method="post">
        @csrf

        <x-input type="password" name="password" autofocus>
            {{ __('label.reset_password') }}
        </x-input>
        <x-input type="password" name="repassword">
            {{ __('label.repassword') }}
        </x-input>

        <button class="btn btn-success" type="submit" name="submit">{{ __('button.submit') }}</button>
    </form>
@endsection
</x-layout>
