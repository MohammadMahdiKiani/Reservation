@extends('layout.AdminDashboardMaster');
@if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
                    
 @endif
@if (session('danger'))
    <div class="alert alert-danger">{{session('danger')}}</div>
                    
    @endif
@error('message')
    <div class="alert alert-danger">{{$message}}</div>
 @enderror
@section('content')

    <table class="table table-striped table-hover">
        <thead>
            <tr>
              <th scope="col">شماره سالن رزرو شده</th>
              <th scope="col">شماره کاربر رزرو کننده</th>
              <th scope="col">روز رزرو</th>
              <th scope="col">ساعت شروع</th>
              <th scope="col">ساعت پایان</th>
              <th scope="col">کد پیگیری</th>
            </tr>
          </thead>
          <tbody>

            @foreach ($reserved as $r)
                    <tr scope="row">
                        <td>
                    {{$r->gyms_id}}
                    
                        </td>
                        <td>
                           {{ $r->user_id}}
                        </td>
                        @php
                        switch ($r->day) {
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
                        <td>
                            {{$day}}
                        </td>
                        <td>
                            {{$r->start_time}}
                        </td>
                        <td>
                            {{$r->end_time}}
                        </td>
                        <td>
                            {{$r->reserv_code}}
                        </td>
                    </tr>
            @endforeach
          </tbody>
    </table>
@endsection