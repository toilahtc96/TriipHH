@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>List Book Combo Of Customer</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">List Book Combo Of Customer</div>
        </div>

        <div class="container" id="container">
            @include('admin.common.search-action')
            <table class="table TFtable" id="book_combo_table">
                <thead class="thead-light">
                    <tr>
                        <th style="width:10%">@sortablelink('fullname','Tên khách hàng')</th>
                        <th style="width:10%">@sortablelink('msisdn','Số điện thoại')</th>
                        <th>@sortablelink('start_date','Ngày đi') </th>
                        <th>Car</th>
                        <th>Pickup Place</th>
                        <th>Combo Type</th>
                        <th>Type Service</th>
                        <th>Link FaceBook</th>
                        <th>Price </th>
                        <th>Status</th>
                        <th>Action</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookcombos as $key => $data)

                    <tr>
                        <td>{{$data->fullname}}</td>
                        <td>{{$data->msisdn}}</td>
                        <td class="td-date">{{$data->start_date}}</td>
                        <td>{{$data->own_car}} - {{$data->car_type}}</td>
                        <td>{{$data->location_name}}</td>
                        <td>{{$data->combo_type_name}}</td>
                        <td>
                            @if($data->type_service == 1)
                            {{__('Tư vấn qua số điện thoại')}}
                            @else
                            {{__('Tư vấn qua FaceBook')}}
                            @endif
                        </td>
                        <td>
                            @if($data->fb_link)
                            <a target="_blank" rel="noopener noreferrer" href="{{$data->fb_link}}">Link</a>
                            @endif
                        </td>
                        <td>{{$data->price}}</td>
                        <td class="td-status">{{$data->status}}</td>
                        <td style="width:18%">@include('admin.common.book-action-select')</td>
                        <td>
                            <a href="{{ url('/admin/bookcombos/' . $data->id . '/edit') }}" class="btn btn-default"><i
                                    class="far fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div> {!! $bookcombos->appends(\Request::except('page'))->render() !!}</div>
        </div>
    </div>
</div>
@endsection