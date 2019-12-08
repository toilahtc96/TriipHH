@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>Quản lý địa điểm</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">Danh sách địa điểm</div>
        </div>
        <div class="container" id="container">
            @include('admin.common.search-action')
            <table class="table TFtable">
                <thead class="thead-light">
                    <tr>
                        <th style="width:12%">@sortablelink('location_name','Tên Địa chỉ')</th>
                        <th>Chi tiết</th>
                        <th style="width:12%">@sortablelink('status','Trạng thái')</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($locations as $key => $data)

                    <tr>
                        <td>{{$data->location_name}}</td>
                        <td>{{$data->detail}}</td>
                        <td>
                            @if($data->status == 1)
                            <!-- Default checked -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input statusLocationSwitch"
                                    id='locationSwitch{{$data->id}}' onchange='testSwitch(this,event)' checked>
                                <label class="custom-control-label" for='locationSwitch{{$data->id}}'>Hoạt động</label>
                            </div>
                            @endif
                            @if($data->status == 0)
                            <!-- Default checked -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input statusLocationSwitch"
                                    id='locationSwitch{{$data->id}}' onchange='testSwitch(this,event)'>
                                <label class="custom-control-label" for='locationSwitch{{$data->id}}'>Không hoạt
                                    động</label>
                            </div>
                            @endif
                        </td>
                        <td>
                            <a href="{{ url('/admin/locations/' . $data->id . '/edit') }}" class="btn btn-default"><i
                                    class="far fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div> {!! $locations->appends(\Request::except('page'))->render() !!}</div>
        </div>
    </div>
</div>
@endsection