@extends('layout.master')

@section('success')
    @if (session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    @endif
@endsection
@section('danger')
    @if (session('danger'))
    <div class="alert alert-success text-center">{{session('danger')}}</div>
    
    @endif 
@endsection

@section('content')
<br><br> <h2 style="display: block;
margin-left: auto;
margin-right: auto;">سالن های ورزشی</h2><br>
<br>
@foreach($gyms->chunk(3) as $chunk)
  <div class="card-group">
    @foreach($chunk as $gym)
    <div class="card" style="width: 18rem;">
      <img src="{{asset('images/'.$gym->src)}}" width="40%" height="40%" class="card-img-top" alt="...">  
      <div class="card-body">
        <h5 class="card-title">{{$gym->name}}</h5>
        <p class="card-text">آدرس: {{$gym->address}}</p>
        <p class="card-text">شماره تماس: {{$gym->phone_number}}</p>
        <p class="card-text">قیمت: {{number_format($gym->price)}} تومان</p>
        <a href="{{route('user.gymdetail',$gym)}}" class="btn btn-primary">مشاهده جزییات</a>
      </div>
    </div>
    @endforeach
  </div>
@endforeach



{{-- <div class="card-group">
<div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
  <div class="card" style="width: 18rem;">
    <img src="..." class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Card title</h5>
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
  </div>
</div> --}}

@endsection
