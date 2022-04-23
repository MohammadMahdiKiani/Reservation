<x-layout name="auth">
    <body>
        @if(isset($message))
        <div class="alert alert-danger">{{$message}}</div>
        @endif
        <form action="{{route('forget')}}" method="post" style="display: flex; flex-direction: column;">
            @csrf
            <x-input type="tel" name="phone_number" autofocus>
                {{ __('label.phone_number') }}
            </x-input>
    
            <button type="submit" name="submit">{{ __('button.generateCode') }}</button>
        </form>
    </body>
    </x-layout>
    
