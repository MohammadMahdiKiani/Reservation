<x-layout name="auth">
<body> 
    @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                    
    @endif
    @if (session('danger'))
    <div class="alert alert-danger">{{session('danger')}}</div>
                    
    @endif
    @error('message')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <form action="{{route('login')}}" method="post" style="display: flex; flex-direction: column;">
        @csrf
        <x-input type="tel" name="phone_number" autofocus>
            {{ __('label.phone_number') }}
        </x-input>

        <x-input type="password" name="password" autofocus>
            {{ __('label.password') }}
        </x-input>

        <button type="submit" name="submit">{{ __('button.login') }}</button>
    </form>
</body>
</x-layout>
