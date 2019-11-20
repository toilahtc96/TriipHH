@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>List Room</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">List Room Of Website</div>
        </div>
        <table class="table TFtable">
            <thead class="thead-light">
                <tr>
                    <th>Hotel Name</th>
                    <th>Room Level</th>
                    <th>Price</th>
                    <th>Service Include</th>
                    <th>Main Image</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($roomHotels as $key => $data)

                <tr>
                    <td>{{$data->hotel_name}}</td>
                    <td>
                        <p>{{$data->level}}</p>
                    </td>
                    <td>
                        <p>{{$data->price}}</p>
                    </td>
                    <td>
                        <div style="word-break: normal">{{$data->service_included}}</div>
                    </td>
                    <td>
                        <div>
                            @if($data->main_image)
                            <img height="100" width="100" alt="Thumb image"
                                src='/images/roomhotels/{{$data->main_image}}' />
                            @endif
                        </div>
                    </td>
                    <td>
                        @if($data->status == 1)
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input statusRoomHotelSwitch"
                                id='roomHotelSwitch{{$data->id}}' onchange='testSwitch(this,event)' checked>
                            <label class="custom-control-label" for='roomHotelSwitch{{$data->id}}'>Hoạt động</label>
                        </div>
                        @endif
                        @if($data->status == 0)
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input statusRoomHotelSwitch"
                                id='roomHotelSwitch{{$data->id}}' onchange='testSwitch(this,event)'>
                            <label class="custom-control-label" for='roomHotelSwitch{{$data->id}}'>Không hoạt động</label>
                        </div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/admin/roomhotels/' . $data->id . '/edit') }}" class="btn btn-default"><i
                                class="far fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>{!! $roomHotels->links() !!}</div>
    </div>
</div>
@endsection