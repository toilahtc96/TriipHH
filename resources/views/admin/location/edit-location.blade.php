@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Edit Location</h2>

        <div class="panel panel-primary ">

            <div class="panel-heading">Edit Location {{($location->location_name)}}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244" height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($location, array('route' => array('locations.update', $location->id), 'method' => 'PUT')) }}

                        {!! Form::label('location_name', 'Location Name', ['class' => 'control-label']) !!}
                        {!! Form::text('location_name', $value = $location->location_name,
                        ['class' => 'form-control', 'rows' => 3]) !!}

                        {!! Form::label('Detail', 'detail', ['class' => 'control-label']) !!}
                        {!! Form::textarea('detail', $value = $location->detail, ['class' =>
                        'form-control','placeholder'=>'Detail', 'rows' => 5]) !!}

                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('status', 'status', ['class' => 'control-label']) !!}
                                {!!Form::select('status', ['1' => 'Hoạt động', '0' => 'Không hoạt động'],
                                $value=$location->status,['class'=> 'form-control'])!!}
                            </div>
                        </div>

                        <div class="mt-3 mb-3">
                            {!!Form::submit('Submit', ['class' => 'btn btn-large btn-primary openbutton
                            form-control'])!!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                    <div class="col-sm-2"></div>
                </div>


            </div>
        </div>


    </div>
</div>

@endsection