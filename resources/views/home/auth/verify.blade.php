<x-layout name="auth">
<body>
    <p>کد تایید به شماره موبایل شما ارسال شد. لطفا کد را وارد کنید.</p>
    <form action="{{route('register.verify')}}" method="post" style="display: flex; flex-direction: column;">
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

        <button type="submit">{{ __('button.Register') }}</button>
    </form>
</body>
</x-layout>
