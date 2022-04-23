<x-layout name="auth">
<body>
    <form action="{{route('register')}}" method="post" style="display: flex; flex-direction: column;">
        @csrf

        <x-input type="text" name="first_name" autofocus>
            {{ __('label.first_name') }}
        </x-input>

        <x-input type="text" name="last_name" autofocus>
            {{ __('label.last_name') }}
        </x-input>

        <x-input type="tel" name="phone_number" autofocus>
            {{ __('label.phone_number') }}
        </x-input>

        <x-input type="password" name="password" autofocus>
            {{ __('label.password') }}
        </x-input>

        <button type="submit">{{ __('button.Register') }}</button>
    </form>
</body>
</x-layout>
