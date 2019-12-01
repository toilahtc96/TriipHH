@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>Quản lý đặt Combo</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">Danh sách đặt combo</div>
        </div>

        <div class="container" id="container">
            @include('admin.common.search-action')
            <table class="table TFtable" id="book_combo_table">
                <thead class="thead-light">
                    <tr>
                        <th style="width:10%">@sortablelink('fullname','Tên khách hàng')</th>
                        <th style="width:10%">@sortablelink('msisdn','Số điện thoại')</th>
                        <th>@sortablelink('start_date','Ngày đi') </th>
                        <th>Xe </th>
                        <th>Điểm đón</th>
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
                    @foreach($bookcombos as $key => $data)

                    <tr>
                        <td>{{$data->fullname}}</td>
                        <td>{{$data->msisdn}}</td>
                        <td class="td-date">
                            {{date('d-m-Y', strtotime($data->start_date)) }}
                        </td>
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