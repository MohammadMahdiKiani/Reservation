<x-layout name="auth">
    <body>
        
        @if($message)
        <div class="alert alert-success">{{$message}}</div>
        @endif
        <form action="{{route('forgetVerify')}}" method="post" style="display: flex; flex-direction: column;">
            @csrf
            <x-input type="tel" name="verify_code" autofocus maxlength="6">
                {{ __('label.verify_code') }}
            </x-input>
    
            <button type="submit" name="submit">{{ __('button.submit') }}</button>
        </form>
    </body>
    </x-layout>
    
