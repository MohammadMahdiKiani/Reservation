@extends('layout.master')

@section('success')
    @if (session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    
    @endif  
@endsection

@section('content')
@php
switch ($reserved->day) {
    case 'Saturday':
    $day = 'شنبه';
    break;
    case 'Sunday':
    $day = 'يكشنبه';
    break;
    case 'Monday':
    $day = 'دوشنبه';
    break;
    case 'Tuesday':
    $day = 'سه شنبه';
     break;
    case 'Wednesday':
    $day = 'چهار شنبه';
    break;
    case 'Thursday':
    $day = 'پنج شنبنه';
    break;
    case 'Friday':
    $day = 'جمعه';
     break;
    default:
        # code...
        break;
}
@endphp
<h3>اطلاعات رزرو</h3>
<h4>سالن {{$gym->name}}</h4>
<h4>در روز {{$day}} و ساعت {{$reserved->start_time}} تا {{$reserved->end_time}}</h4>
<h2> کد پیگیری {{$reserved->reserv_code}}</h2>

@endsection
