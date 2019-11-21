@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>List Book Custom Combo Of Customer</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">List Book Custom Combo Of Customer</div>
        </div>
        <table class="table TFtable">
            <thead class="thead-light">
                <tr>
                    <th>Full Name</th>
                    <th>Phone</th>
                    <th>Start Date </th>
                    <th>Car</th>
                    <th>Pickup Place</th>
                    <th>Combo Type</th>
                    <th>Checkin Time</th>
                    <th>Checkout Time</th>
                    <th>Type Service</th>
                    <th>Link FaceBook</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bookcustomtrips as $key => $data)

                <tr>
                    <td>{{$data->fullName}}</td>
                    <td>{{$data->msisdn}}</td>
                    <td class="td-date">{{$data->start_date}}</td>
                    <td>{{$data->own_car}}</td>
                    <td>{{$data->location_name}}</td>
                    <td>{{$data->combo_type_name}}</td>
                    <td>{{$data->checkin_time}}</td>
                    <td>{{$data->checkout_time}}</td>
                    <td>
                        @if($data->type_service == 1)
                        {{__('Tư vấn qua số điện thoại')}}
                        @else
                        {{__('Tư vấn qua FaceBook')}}
                        @endif
                    </td>
                  <td>
                        {{$data->checkout_time}}
                  </td>
                    <td>
                     
                    </td>

                    <td>
                        <a href="{{ url('/admin/bookcustomtrips/' . $data->id . '/edit') }}" class="btn btn-default"><i
                                class="far fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>{!! $bookcustomtrips->links() !!}</div>
    </div>
</div>
@endsection