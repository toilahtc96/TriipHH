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
                @foreach($cars as $key => $data)

                <tr>
                    <td></td>
                    <td>
                        <div></div>
                    </td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td>
                       
                    </td>
                    <td>
                       
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1" checked>
                            <label class="custom-control-label" for="customSwitch1">Hoạt động</label>
                        </div>
                     
                       
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="customSwitch1">
                            <label class="custom-control-label" for="customSwitch1">Hoạt động</label>
                        </div>
                     
                    </td>
                    <td></td>
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