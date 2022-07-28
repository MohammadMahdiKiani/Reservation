@extends('layout.master')

@section('success')
    @if (session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    
    @endif  
@endsection

@section('content')

@php
    switch ($datetime[0]) {
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
<br>
<h3>رزرو سالن {{$gym->name}}</h3>
<h3>در روز {{$day}} و ساعت {{$datetime[1]}} تا {{$datetime[2]}}</h3>
<br>
<h5>اطلاعات رزرو سالن صحيح مي باشد. كليك روي دكمه رزرو نهايي به منزله پذيرش اطلاعات رزرو است.</h5>
<form action="{{route('user.reserv')}}" method="post">
    @csrf
    <input type="hidden" name="gym_id" value="{{$gym->id}}">
    <input type="hidden" name="day" value="{{$datetime[0]}}">
    <input type="hidden" name="start_time" value="{{$datetime[1]}}">
    <input type="hidden" name="end_time" value="{{$datetime[2]}}">
    <input class="btn btn-primary" value="پرداخت و رزرو نهايي" type="submit">
</form>

@endsection
