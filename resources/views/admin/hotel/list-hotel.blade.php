@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>List Hotel</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">List Hotel Active Of Website</div>
        </div>
        <table class="table TFtable">
            <thead class="thead-light">
                <tr>
                    <th>Hotel Name</th>
                    <th>Service Included</th>
                    <th>Level</th>
                    <th>Info</th>
                    <th>Place Around</th>
                    <th>Rate</th>
                    <th>Status</th>
                    <th>Address Id</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hotels as $key => $data)

                <tr>
                    <td>{{$data->hotel_name}}</td>
                    <td>
                        <div>{{$data->service_included}}</div>
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
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                            <label class="custom-control-label" for="customSwitch1">Hoạt động</label>
                        </div>
                        @endif
                        @if($data->status == 0)
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Không hoạt động</label>
                        </div>
                        @endif
                    </td>
                    <td>{{$data->address_id}}</td>
                    <td>
                        <a href="{{ url('/admin/hotels/' . $data->id . '/edit') }}" class="btn btn-default"><i class="far fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>{!! $hotels->links() !!}</div>
    </div>
</div>
@endsection