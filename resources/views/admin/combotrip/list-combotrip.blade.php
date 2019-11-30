@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>Quản lý Combo </h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">Danh sách combo</div>
        </div>
        <div class="container" id="container">
            @include('admin.common.search-action')
            <table class="table TFtable">
                <thead class="thead-light">
                    <tr>
                        <th style="width:10%">@sortablelink('hotel_id','Tên khách sạn')</th>
                        <th>@sortablelink('level','Hạng phòng')</th>
                        <th>@sortablelink('combo_type_name','Loại combo')</th>
                        <th>@sortablelink('car_id','Xe')</th>
                        <th>Giờ bắt đầu</th>
                        <th>Giờ dự kiến đến</th>
                        <th>@sortablelink('start_date','Ngày bắt đầu')</th>
                        <th>@sortablelink('end_date','Ngày kết thúc')</th>
                        <th>@sortablelink('price','Giá tiền')</th>
                        <th>@sortablelink('status','Trạng thái')</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($combotrips as $key => $data)

                    <tr>
                        <td>{{$data->hotel_name}}</td>
                        <td>{{$data->level}}</td>
                        <td>{{$data->combo_type_name}}</td>
                        <td>{{$data->own_car}}</td>
                        <td>{{$data->start_time}}</td>
                        <td>{{$data->arrival_time}}</td>
                        <td class="td-date">{{$data->start_date}}</td>
                        <td class="td-date">{{$data->end_date}}</td>
                        <td>{{$data->price}}</td>

                        <td>
                            @if($data->status == 1)
                            <!-- Default checked -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input statusComboTripSwitch"
                                    id='combotripSwitch{{$data->id}}' onchange='testSwitch(this,event)' checked>
                                <label class="custom-control-label" for='combotripSwitch{{$data->id}}'>Hoạt động</label>
                            </div>
                            @endif
                            @if($data->status == 0)
                            <!-- Default checked -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input statusComboTripSwitch"
                                    id='combotripSwitch{{$data->id}}' onchange='testSwitch(this,event)'>
                                <label class="custom-control-label" for='combotripSwitch{{$data->id}}'>Không hoạt
                                    động</label>
                            </div>
                            @endif
                        </td>

                        <td>
                            <a href="{{ url('/admin/combotrips/' . $data->id . '/edit') }}" class="btn btn-default"><i
                                    class="far fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div> {!! $combotrips->appends(\Request::except('page'))->render() !!}</div>
        </div>
    </div>
</div>
@endsection