@extends('layout.master')
<x-layout name="auth">
@section('content')
        @if(isset($message))
        <div class="alert alert-danger">{{$message}}</div>
        @endif
        <form action="{{route('forget')}}" method="post">
            @csrf
            <x-input type="tel" name="phone_number" autofocus>
                {{ __('label.phone_number') }}
            </x-input>
    
            <button class="btn btn-success" type="submit" name="submit">{{ __('button.generateCode') }}</button>
        </form>
@endsection
    </x-layout>
    
