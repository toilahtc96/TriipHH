@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">
        <h2>Bootstrap 4 Panel Heading Example</h2>
        <div class="panel panel-primary ">
            <div class="panel-heading">Bootstrap 4 Panel Heading</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-12">
                        {!! Form::open(['method' => 'post', 'action' => 'HotelController@index', 'files' => true, 'class' => 'form-horizontal']) !!}

                        {!! Form::label('hotel_name', 'Hotel Name', ['class' => 'control-label']) !!}
                        {!! Form::text('hotel_name', $value = "", ['class' => 'form-control', 'rows' => 3]) !!}

                        {!! Form::label('service_included', 'service', ['class' => 'control-label']) !!}
                        {!! Form::textarea('service_included', $value = "", ['class' => 'form-control','placeholder'=>'Service Include', 'rows' => 5]) !!}
                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('level', 'level', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('level', 1, 5, null, ['class'=> 'form-control']) !!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('address_id', 'Address', ['class' => 'control-label']) !!}
                                {!!Form::select('size', ['L' => 'Núi BV', 'S' => 'Đảo XC'], null, ['class'=> 'form-control'])!!}
                            </div>
                        </div>
                        {!! Form::label('info', 'info', ['class' => 'control-label']) !!}
                        {!! Form::textarea('info', $value = "", ['class' => 'form-control','placeholder'=>'info Hotel', 'rows' => 5]) !!}
                        {!! Form::label('main_info', 'Main Info', ['class' => 'control-label']) !!}
                        {!! Form::textarea('main_info', $value = "", ['class' => 'form-control','placeholder'=>'Main Info Hotel', 'rows' => 5]) !!}
                        {!! Form::label('general_rule', 'General Rule', ['class' => 'control-label']) !!}
                        {!! Form::textarea('general_rule', $value = "", ['class' => 'form-control','placeholder'=>'General Rule Hotel', 'rows' => 5]) !!}
                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('place_around', 'Place Around', ['class' => 'control-label']) !!}
                                {!!Form::select('size', ['L' => 'Núi BV', 'S' => 'Đảo XC'], null, ['multiple'=>true,'class'=> 'form-control'])!!}
                            </div>

                            <div class="col-sm-4 ">
                                {!! Form::label('rate', 'rate', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('rate', 1, 5, null, ['class'=> 'form-control']) !!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('status', 'status', ['class' => 'control-label']) !!}
                                {!!Form::select('size', ['0' => 'Hoạt động', '1' => 'Không hoạt động'], null, ['class'=> 'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-4 ">
                            {!! Form::label('main_image', 'Main Image', ['class' => 'control-label']) !!}
                            {!! Form::file('main_image',['class'=>'form-control']) !!}
                        </div>
                        <div class="row ">
                            {!!Form::submit('Submit', ['class' => 'btn btn-large btn-primary openbutton form-control'])!!}
                            {!! Form::close() !!}
                        </div>
                    </div>
                </div>


            </div>
        </div>


    </div>
</div>
@endsection