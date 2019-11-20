@extends('admin.admin_template_layout')
@section('content')
<div class="row">
    <div class="container">
        <h2>List ComboType</h2>
        <div class="panel panel-primary ">

            <div class="panel-heading">List ComboType Of Website</div>
        </div>
        <table class="table TFtable">
            <thead class="thead-light">
                <tr>
                    <th>Combo Type Name</th>
                    <th>Detail</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($combotypes as $key => $data)

                <tr>
                    <td>{{$data->combo_type_name}}</td>
                    <td>{{$data->detail}}</td>
                    <td>
                        @if($data->status == 1)
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input statusComboTypeSwitch" id='combotypeSwitch{{$data->id}}' onchange='testSwitch(this,event)' checked>
                            <label class="custom-control-label" for='combotypeSwitch{{$data->id}}'>Hoạt động</label>
                        </div>
                        @endif
                        @if($data->status == 0)
                        <!-- Default checked -->
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input statusComboTypeSwitch" id='combotypeSwitch{{$data->id}}' onchange='testSwitch(this,event)'>
                            <label class="custom-control-label" for='combotypeSwitch{{$data->id}}'>Không hoạt động</label>
                        </div>
                        @endif
                    </td>
                    <td>
                        <a href="{{ url('/admin/combotypes/' . $data->id . '/edit') }}" class="btn btn-default"><i class="far fa-edit"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
        <div>{!! $combotypes->links() !!}</div>
    </div>
</div>
@endsection