@extends('layout.master')
<x-layout name="auth">
@section('content')
        
        @if($message)
        <div class="alert alert-success">{{$message}}</div>
        @endif
        <form action="{{route('forgetVerify')}}" method="post">
            @csrf
            <x-input type="tel" name="verify_code" autofocus maxlength="6">
                {{ __('label.verify_code') }}
            </x-input>
    
            <button class="btn btn-info" type="submit" name="submit">{{ __('button.submit') }}</button>
        </form>
@endsection
    </x-layout>
    
