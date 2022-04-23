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
    <form action="{{route('resetPassword')}}" method="post" style="display: flex; flex-direction: column;">
        @csrf

        <x-input type="password" name="password" autofocus>
            {{ __('label.reset_password') }}
        </x-input>
        <x-input type="password" name="repassword" autofocus>
            {{ __('label.repassword') }}
        </x-input>

        <button type="submit" name="submit">{{ __('button.submit') }}</button>
    </form>
</body>
</x-layout>
