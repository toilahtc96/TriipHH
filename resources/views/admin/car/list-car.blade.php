@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>List Car</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">List Car Active Of Website</div>
        </div>
        <table class="table TFtable">
            <thead class="thead-light">
                <tr>
                    <th>Own Car</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Car Type</th>
                    <th>Starting -> Destination</th>
                    <th>Places Passing</th>
                    <th>Count Seat</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cars as $key => $data)

                <tr>
                    <td>{{$data->own_car}}</td>
                    <td>
                        <p>{{$data->price}}</p>
                    </td>
                    <td>
                        <div>
                            @if($data->main_image)
                            <img height="100" width="100" alt="Thumb image" src='/images/cars/{{$data->main_image}}' />
                            @endif
                        </div>
                    </td>
                    <td>{{$data->car_type}}</td>
                    <td>
                        @if($data->start)
                        {{$data->start }}
                        @endif
                        @if($data->start && $data->finish)
                        ->
                        @endif
                        @if($data->finish)
                        {{$data->finish}}
                        @endif
                    </td>
                    <td>{{$data->places_passing}}</td>
                    <td>{{$data->count_seat}}</td>
                    <td>
                        @if($data->status == 1)
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input statusCarSwitch" id='carSwitch{{$data->id}}' onchange='testSwitch(this,event)' checked>
                            <label class="custom-control-label" for='carSwitch{{$data->id}}'>Hoạt động</label>
                        </div>
                        @endif
                        @if($data->status == 0)
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input statusCarSwitch" id='carSwitch{{$data->id}}' onchange='testSwitch(this,event)'>
                            <label class="custom-control-label" for='carSwitch{{$data->id}}'>Không hoạt động</label>
                        </div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/admin/cars/' . $data->id . '/edit') }}" class="btn btn-default"><i class="far fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>{!! $cars->links() !!}</div>
    </div>
</div>
@endsection