@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>Quản lý đặt phòng</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">Danh sách đặt phòng</div>
        </div>
        <div class="container" id="container">
            @include('admin.common.search-action')
            <table class="table TFtable" id="book_room_table">
                <thead class="thead-light">
                    <tr>
                        <th style="width:10%">@sortablelink('fullname','Tên khách hàng')</th>
                        <th>Số điện thoại </th>
                        <th style="width:10%">@sortablelink('room_id','Tên khách sạn')</th>
                        <th>Hạng phòng</th>
                        <th >@sortablelink('start_date','Ngày đặt')</th>
                        <th>Loại combo</th>
                        <th>Tư vấn</th>
                        <th>Link FaceBook</th>
                        <th>Giá</th>
                        <th>@sortablelink('status','Trạng thái')</th>
                        <th>Hành động</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookrooms as $key => $data)

                    <tr>
                        <td>{{$data->fullname}}</td>
                        <td>{{$data->msisdn}}</td>
                        <td>{{$data->hotel_name}}</td>
                        <td>{{$data->level}}</td>
                        <td class="td-date"> {{date('d-m-Y', strtotime($data->start_date)) }}</td>
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
                            <a href="{{ url('/admin/bookrooms/' . $data->id . '/edit') }}" class="btn btn-default"><i
                                    class="far fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div> {!! $bookrooms->appends(\Request::except('page'))->render() !!}</div>
        </div>

    </div>
</div>
@endsection