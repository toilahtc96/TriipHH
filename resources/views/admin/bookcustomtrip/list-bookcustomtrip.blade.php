@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>Quản lý Đặt Combo Tùy Chọn</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">Danh sách Combo Tùy chọn</div>
        </div>
        <div class="container" id="container">
            @include('admin.common.search-action')
            <table class="table TFtable" id="book_custom_trip_table">
                <thead class="thead-light">
                    <tr>
                        <th style="width:10%">@sortablelink('fullname','Tên khách hàng')</th>
                        <th>@sortablelink('msisdn','Số điện thoại')</th>
                        <th style="width:10%">@sortablelink('start_date','Ngày đi')</th>
                        <th style="width:10%">@sortablelink('car_id','Xe')</th>
                        <th style="width:10%">@sortablelink('pickup_place_id','Nơi đón')</th>
                        <th>Loại Combo</th>
                        <th>Tư vấn</th>
                        <th>Link FaceBook</th>
                        <th>Giá </th>
                        <th>@sortablelink('status','Trạng thái')</th>
                        <th>Hành động</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookcustomtrips as $key => $data)

                    <tr>
                        <td>{{$data->fullname}}</td>
                        <td>{{$data->msisdn}}</td>

                        <td class="td-date">
                            {{date('d-m-Y', strtotime($data->start_date)) }}
                        </td>
                        <td>{{$data->own_car}}</td>
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
                            <a href="{{ url('/admin/bookcustomtrips/' . $data->id . '/edit') }}"
                                class="btn btn-default"><i class="far fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div> {!! $bookcustomtrips->appends(\Request::except('page'))->render() !!}</div>
        </div>

    </div>
</div>
@endsection