@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>Danh sách khách sạn</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">Danh sách khách sạn của HHTravel</div>
        </div>
        <div class="container" id="container">
            @include('admin.common.search-action')
            <table class="table TFtable">
                <thead class="thead-light">
                    <tr>
                        <th style="width:15%">@sortablelink('hotel_name','Tên khách sạn')</th>
                        <th>Dịch vụ kèm theo</th>
                        <th>Ảnh chính</th>
                        <th>Hạng</th>
                        <th>Thông tin</th>
                        <th>Địa điểm lân cận</th>
                        <th>Đánh giá</th>
                        <th style="width:10%">@sortablelink('status','Trạng thái')</th>
                        <th>Địa điểm</th>
                        <th>Hành động</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotels as $key => $data)

                    <tr>
                        <td>{{$data->hotel_name}}</td>
                        <td>
                            <div style="word-break: normal">{{$data->service_included}}</div>
                        </td>
                        <td>
                            <div>
                                <img height="100" width="100" alt="Thumb image"
                                    src='/images/hotels/{{$data->main_image}}' />
                            </div>
                        </td>
                        <td>{{$data->level}}</td>
                        <td>{{$data->info}}</td>
                        <td>{{$data->place_around}}</td>
                        <td>
                            @for($i=0;$i<$data->rate;$i++)
                                <span class="fa fa-star checked"></span>
                                @endfor
                                @for($i=4;$i>=$data->rate;$i--)
                                <span class="fa fa-star"></span>
                                @endfor
                        </td>
                        <td>
                            @if($data->status == 1)
                            <!-- Default checked -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input statusHotelSwitch"
                                    id='hotelSwitch{{$data->id}}' onchange='testSwitch(this,event)' checked>
                                <label class="custom-control-label" for='hotelSwitch{{$data->id}}'>Hoạt động</label>
                            </div>
                            @endif
                            @if($data->status == 0)
                            <!-- Default checked -->
                            <div class="custom-control custom-switch">
                                <input type="checkbox" class="custom-control-input statusHotelSwitch"
                                    id='hotelSwitch{{$data->id}}' onchange='testSwitch(this,event)'>
                                <label class="custom-control-label" for='hotelSwitch{{$data->id}}'>Không hoạt
                                    động</label>
                            </div>
                            @endif
                        </td>
                        <td>{{$data->location_name}}</td>
                        <td>
                            <a href="{{ url('/admin/hotels/' . $data->id . '/edit') }}" class="btn btn-default"><i
                                    class="far fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
            <div> {!! $hotels->appends(\Request::except('page'))->render() !!}</div>
        </div>
    </div>
</div>
@endsection