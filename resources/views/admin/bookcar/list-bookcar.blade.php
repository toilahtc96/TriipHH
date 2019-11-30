@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>Quản lý đặt xe</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">Danh sách đặt xe</div>
        </div>

        <div class="container" id="container">
            @include('admin.common.search-action')
            <table class="table TFtable" id="book_car_table">
                <thead class="thead-light">
                    <tr>

                        <th style="width:10%">@sortablelink('fullname','Tên khách hàng')</th>
                        <th style="width:10%">@sortablelink('msisdn','Phone')</th>
                        <th>@sortablelink('car_id','Car') </th>
                        <th>@sortablelink('start_date','Ngày đi')</th>
                        <th>Giờ dự kiến đến</th>
                        <th style="width:10%">Điểm đón </th>
                        <th>Tư vấn</th>
                        <th>Link FaceBook</th>
                        <th>Giá</th>
                        <th> @sortablelink('status','Trạng thái')</th>
                        <th>Hành động</th>
                        <th>Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bookcars as $key => $data)

                    <tr>
                        <td>{{$data->fullname}}</td>
                        <td>{{$data->msisdn}}</td>
                        <td>{{$data->own_car}} - {{$data->car_type}}</td>

                        <td style="width:10%">{{$data->start_date}}</td>
                        <td>{{$data->arrival_time}}</td>
                        <td>{{$data->location_name}}</td>
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
                            <a href="{{ url('/admin/bookcars/' . $data->id . '/edit') }}" class="btn btn-default"><i
                                    class="far fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            {!! $bookcars->appends(\Request::except('page'))->render() !!}
        </div>
        {{-- <div>{!! $bookcars->appends(['sort' => 'fullname','direction'=>'asc'])->links() !!}</div> --}}
    </div>
</div>
@endsection