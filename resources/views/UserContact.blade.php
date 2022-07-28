@extends('layout.master')

@section('success')
    @if (session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    
    @endif  
@endsection

@section('content')
<br><br> <h2>ارتباط با ما</h2><br>

<br>
<p>راه های ارتباطی:</p><br>
<p>شماره تماس پشتیبانی: 09162030113</p><br>
<p>ایمیل پشتیبانی: support@sportreserv.com</p><br>
<p>سالن داران محترم جهت ثبت سالن خود با شماره زیر تماس بگیرند:
    </p><p>031-22457</p>



@endsection
