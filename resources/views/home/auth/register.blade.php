@extends('layout.master')
<x-layout name="auth">
@section('content')

    
    <form action="{{route('register')}}" method="post">
        @csrf
        
        <x-input placeholder="نام به صورت انگلیسی وارد شود" type="text" name="first_name" autofocus>
            {{ __('label.first_name') }}
        </x-input>

        <x-input placeholder="نام خانوادگی به صورت انگلیسی وارد شود" type="text" name="last_name" autofocus>
            {{ __('label.last_name') }}
        </x-input>

        <x-input placeholder="شماره موبایل باید 11 رقم باشد" type="tel" name="phone_number" autofocus>
            {{ __('label.phone_number') }}
        </x-input>

        <x-input placeholder="حداقل 8 کاراکتر"  type="password" name="password" autofocus>
            {{ __('label.password') }}
        </x-input>
        

        <button class="btn btn-success" type="submit">{{ __('button.Register') }}</button>
    </form>
    <a class="btn btn-link" href="{{route('login')}}">قبلا ثبت نام کردید؟ هم اکنون وارد شوید</a>

@endsection

</x-layout>
