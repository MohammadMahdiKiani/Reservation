@extends('layout.master')

@section('success')
    @if (session('success'))
    <div class="alert alert-success text-center">{{session('success')}}</div>
    
    @endif  
@endsection
@section('danger')
    @if (session('danger'))
    <div class="alert alert-danger text-center">{{session('danger')}}</div>
    
    @endif  
@endsection

@section('content')
<br><br>
<h2> سالن &nbsp;{{$gym->name}}</h2><br>
<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      
        @if (isset($gymimage[0]))
        <div class="carousel-item active">
            <img class="d-block w-100" src="{{asset('images/'.$gymimage[0]['src'])}}" alt="First slide">
      </div>
        @endif
        @if (isset($gymimage[1]))
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/'.$gymimage[1]['src'])}}" alt="First slide">
      </div>
        @endif
        @if (isset($gymimage[2]))
        <div class="carousel-item">
            <img class="d-block w-100" src="{{asset('images/'.$gymimage[2]['src'])}}" alt="First slide">
      </div>
        @endif
    
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

  <br>
  <h4>در این سالن می توانید ورزش های زیر را انجام دهید:</h4>
  <br>
  @if ($gym->football==1)
      <h5> - فوتبال</h5>
  @endif
  @if ($gym->volleyball==1)
      <h5> - والیبال</h5>
  @endif
  @if ($gym->basketball==1)
      <h5> - بسکتبال</h5>
  @endif
  @if ($gym->handball==1)
      <h5> - هندبال</h5>
  @endif
  <br><br>
  <h4>امکانات:</h4><br>
  @if ($gym->locker_room==1)
      <h5> - رختکن</h5>
  @endif
  @if ($gym->drinking_water==1)
      <h5> - آبخوری</h5>
  @endif
  @if ($gym->bathroom==1)
      <h5> - حمام</h5>
  @endif
  <br>
  <h4>قیمت: </h4>
  <h5>{{number_format($gym->price)}} تومان</h5>
<br>
<h4>آدرس:</h4><br>
<h5>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$gym->address}}</h5><br>
<h5> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;شماره تماس : {{$gym->phone_number}}</h5>
<br>

<form action="{{route('user.indexreserv')}}" method="post">
    @csrf
    <input type="hidden" name="gym_id" value="{{$gym->id}}">
<table class="table table-striped table-hover">
    <thead>
        <tr>
          <th scope="col">زمان سانس</th>
          <th scope="col">شنبه</th>
          <th scope="col">یکشنبه</th>
          <th scope="col">دوشنبه</th>
          <th scope="col">سه شنبه</th>
          <th scope="col">چهارشنبه</th>
          <th scope="col">پنجشنبه</th>
          <th scope="col">جمعه</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">7:30 تا 9:00</th>
          <td><input name="radio" type="radio" value="Saturday 7:30 9:00"></td>
          <td><input name="radio" type="radio" value="Sunday 7:30 9:00"></td>
          <td><input name="radio" type="radio" value="Monday 7:30 9:00"></td>
          <td><input name="radio" type="radio" value="Tuesday 7:30 9:00"></td>
          <td><input name="radio" type="radio" value="Wednesday 7:30 9:00"></td>
          <td><input name="radio" type="radio" value="Thursday 7:30 9:00"></td>
          <td><input name="radio" type="radio" value="Friday 7:30 9:00"></td>
        </tr>
        <tr>
            <th scope="row">9:00 تا 10:30</th>
            <td><input name="radio" type="radio" value="Saturday 9:00 10:30"></td>
            <td><input name="radio" type="radio" value="Sunday 9:00 10:30"></td>
            <td><input name="radio" type="radio" value="Monday 9:00 10:30"></td>
            <td><input name="radio" type="radio" value="Tuesday 9:00 10:30"></td>
            <td><input name="radio" type="radio" value="Wednesday 9:00 10:30"></td>
            <td><input name="radio" type="radio" value="Thursday 9:00 10:30"></td>
            <td><input name="radio" type="radio" value="Friday 9:00 10:30"></td>
          </tr>
          <tr>
            <th scope="row">10:30 تا 12:00</th>
            <td><input name="radio" type="radio" value="Saturday 10:30 12:00"></td>
            <td><input name="radio" type="radio" value="Sunday 10:30 12:00"></td>
            <td><input name="radio" type="radio" value="Monday 10:30 12:00"></td>
            <td><input name="radio" type="radio" value="Tuesday 10:30 12:00"></td>
            <td><input name="radio" type="radio" value="Wednesday 10:30 12:00"></td>
            <td><input name="radio" type="radio" value="Thursday 10:30 12:00"></td>
            <td><input name="radio" type="radio" value="Friday 10:30 12:00"></td>
          </tr>
          <tr>
            <th scope="row">12:00 تا 13:30</th>
            <td><input name="radio" type="radio" value="Saturday 12:00 13:30"></td>
            <td><input name="radio" type="radio" value="Sunday 12:00 13:30"></td>
            <td><input name="radio" type="radio" value="Monday 12:00 13:30"></td>
            <td><input name="radio" type="radio" value="Tuesday 12:00 13:30"></td>
            <td><input name="radio" type="radio" value="Wednesday 12:00 13:30"></td>
            <td><input name="radio" type="radio" value="Thursday 12:00 13:30"></td>
            <td><input name="radio" type="radio" value="Friday 12:00 13:30"></td>
          </tr>
          <tr>
            <th scope="row">13:30 تا 15:00</th>
            <td><input name="radio" type="radio" value="Saturday 13:30 15:00"></td>
            <td><input name="radio" type="radio" value="Sunday 13:30 15:00"></td>
            <td><input name="radio" type="radio" value="Monday 13:30 15:00"></td>
            <td><input name="radio" type="radio" value="Tuesday 13:30 15:00"></td>
            <td><input name="radio" type="radio" value="Wednesday 13:30 15:00"></td>
            <td><input name="radio" type="radio" value="Thursday 13:30 15:00"></td>
            <td><input name="radio" type="radio" value="Friday 13:30 15:00"></td>
          </tr>
          <tr>
            <th scope="row">15:00 تا 16:30</th>
            <td><input name="radio" type="radio" value="Saturday 15:00 16:30"></td>
            <td><input name="radio" type="radio" value="Sunday 15:00 16:30"></td>
            <td><input name="radio" type="radio" value="Monday 15:00 16:30"></td>
            <td><input name="radio" type="radio" value="Tuesday 15:00 16:30"></td>
            <td><input name="radio" type="radio" value="Wednesday 15:00 16:30"></td>
            <td><input name="radio" type="radio" value="Thursday 15:00 16:30"></td>
            <td><input name="radio" type="radio" value="Friday 15:00 16:30"></td>
          </tr>
          <tr>
            <th scope="row">16:30 تا 18:00</th>
            <td><input name="radio" type="radio" value="Saturday 16:30 18:00"></td>
            <td><input name="radio" type="radio" value="Sunday 16:30 18:00"></td>
            <td><input name="radio" type="radio" value="Monday 16:30 18:00"></td>
            <td><input name="radio" type="radio" value="Tuesday 16:30 18:00"></td>
            <td><input name="radio" type="radio" value="Wednesday 16:30 18:00"></td>
            <td><input name="radio" type="radio" value="Thursday 16:30 18:00"></td>
            <td><input name="radio" type="radio" value="Friday 16:30 18:00"></td>
          </tr>
          <tr>
            <th scope="row">18:00 تا 19:30</th>
            <td><input name="radio" type="radio" value="Saturday 18:00 19:30"></td>
            <td><input name="radio" type="radio" value="Sunday 18:00 19:30"></td>
            <td><input name="radio" type="radio" value="Monday 18:00 19:30"></td>
            <td><input name="radio" type="radio" value="Tuesday 18:00 19:30"></td>
            <td><input name="radio" type="radio" value="Wednesday 18:00 19:30"></td>
            <td><input name="radio" type="radio" value="Thursday 18:00 19:30"></td>
            <td><input name="radio" type="radio" value="Friday 18:00 19:30"></td>
          </tr>
          <tr>
            <th scope="row">19:30 تا 21:00</th>
            <td><input name="radio" type="radio" value="Saturday 19:30 21:00"></td>
            <td><input name="radio" type="radio" value="Sunday 19:30 21:00"></td>
            <td><input name="radio" type="radio" value="Monday 19:30 21:00"></td>
            <td><input name="radio" type="radio" value="Tuesday 19:30 21:00"></td>
            <td><input name="radio" type="radio" value="Wednesday 19:30 21:00"></td>
            <td><input name="radio" type="radio" value="Thursday 19:30 21:00"></td>
            <td><input name="radio" type="radio" value="Friday 19:30 21:00"></td>
          </tr>
          <tr>
            <th scope="row">21:00 تا 22:30</th>
            <td><input name="radio" type="radio" value="Saturday 21:00 22:30"></td>
            <td><input name="radio" type="radio" value="Sunday 21:00 22:30"></td>
            <td><input name="radio" type="radio" value="Monday 21:00 22:30"></td>
            <td><input name="radio" type="radio" value="Tuesday 21:00 22:30"></td>
            <td><input name="radio" type="radio" value="Wednesday 21:00 22:30"></td>
            <td><input name="radio" type="radio" value="Thursday 21:00 22:30"></td>
            <td><input name="radio" type="radio" value="Friday 21:00 22:30"></td>
          </tr>
      </tbody>
  </table>
  
  <button class="btn btn-success" type="submit" name="submit">{{ __('button.reserv') }}</button>
</form>


@endsection
