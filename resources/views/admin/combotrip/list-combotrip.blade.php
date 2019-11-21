@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>List Combo Trip</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">List Combo Trip Of Website</div>
        </div>
        <table class="table TFtable">
            <thead class="thead-light">
                <tr>
                    <th>Hotel Name</th>
                    <th>Room Level</th>
                    <th>Combo Type</th>
                    <th>Car</th>
                    <th>Start Time</th>
                    <th>Arrival Time</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Price</th>
                    <th>Status</th>
                    <th>Action</th>
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
                            <label class="custom-control-label" for='combotripSwitch{{$data->id}}'>Không hoạt động</label>
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
        <div>{!! $combotrips->links() !!}</div>
    </div>
</div>
@endsection