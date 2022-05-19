@extends('layout.UserDashboardMaster');
@section('content')
@if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                    
    @endif
    @if (session('danger'))
    <div class="alert alert-danger">{{session('danger')}}</div>
                    
    @endif
    @error('message')
    <div class="alert alert-danger">{{$message}}</div>
    @enderror
    <h2>جای اطلاعات</h2>
@endsection