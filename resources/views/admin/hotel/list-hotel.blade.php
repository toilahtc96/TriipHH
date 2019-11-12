@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>List Hotel</h2>

        <div class="panel panel-primary ">

            <div class="panel-heading">List Hotel Active Of Website</div>
        </div>
        <table class="table">
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
                    <th>{{$data->hotel_name}}</th>
                    <th>{{$data->service_included}}</th>
                    <th>{{$data->level}}</th>
                    <th>{{$data->info}}</th>
                    <th>{{$data->place_around}}</th>
                    <th>{{$data->rate}}</th>
                    <th>{{$data->status}}</th>
                    <th>{{$data->address_id}}</th>
                    <th>
                        <a href="{{ url('/admin/hotels/' . $data->id . '/edit') }}"
                            class="btn btn-default"><i class="far fa-edit"></i></a>
                    </th>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection