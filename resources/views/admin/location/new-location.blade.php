@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>{{__('Add New Location')}}</h2>

        <div class="panel panel-primary ">

            <div class="panel-heading">{{__('add Location For Website')}}</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="{!! asset('bower_components/images/kissclipart-hotel-clipart-hotel-clip-art-243e5c97e85fab97.jpg') !!}" alt="" width="244" height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['method' => 'post', 'action' => 'LocationController@index',
                        'class' => 'form-horizontal']) !!}

                        {!! Form::label('location_name', 'Location Name', ['class' => 'control-label']) !!}
                        {!! Form::text('location_name', $value = "", ['class' => 'form-control', 'rows' => 3]) !!}

                        {!! Form::label('Detail', 'detail', ['class' => 'control-label']) !!}
                        {!! Form::textarea('detail', $value = "", ['class' =>
                        'form-control','placeholder'=>'Location Detail', 'rows' => 5]) !!}

                        <div class="col-sm-4 ">
                            {!! Form::label('status', 'status', ['class' => 'control-label']) !!}
                            {!!Form::select('status', ['1' => 'Hoạt động', '0' => 'Không hoạt động'], null,
                            ['class'=>
                            'form-control'])!!}
                        </div>
                        <div class="mt-3 mb-3">
                            {!!Form::submit('Submit', ['class' => 'btn btn-large btn-primary openbutton
                            form-control','onClick'=>'getValue()'])!!}
                            {!! Form::close() !!}
                        </div>
                    </div>

                </div>
                <div class="col-sm-2"></div>
            </div>


        </div>
    </div>


</div>
</div>
@endsection