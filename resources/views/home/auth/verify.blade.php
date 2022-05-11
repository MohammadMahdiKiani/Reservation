@extends('layout.master')
<x-layout name="auth">
@section('content')
<div class="alert alert-success">کد تایید برای شما ارسال شد</div>
    <form action="{{route('register.verify')}}" method="post">
        @csrf

        <x-input type="text" name="first_name" autofocus :value="$data['first_name']">
            {{ __('label.first_name') }}
        </x-input>

        <x-input type="text" name="last_name" autofocus :value="$data['last_name']">
            {{ __('label.last_name') }}
        </x-input>

        <x-input type="tel" name="phone_number" autofocus maxlength="11" :value="$data['phone_number']">
            {{ __('label.phone_number') }}
        </x-input>

        <x-input type="password" name="password" autofocus :value="$data['password']">
            {{ __('label.password') }}
        </x-input>

        <x-input type="tel" name="verify_code" autofocus maxlength="6">
            {{ __('label.verify_code') }}
        </x-input>

        <button class="btn btn-success" type="submit">{{ __('button.Register') }}</button>
    </form>
@endsection
</x-layout>
