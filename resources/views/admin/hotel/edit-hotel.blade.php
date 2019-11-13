@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Edit Hotel</h2>

        <div class="panel panel-primary ">

            <div class="panel-heading">Edit Hotel {{($hotel->hotel_name)}}</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244" height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($hotel, array('route' => array('hotels.update', $hotel->id), 'method' => 'PUT')) }}

                        {!! Form::label('hotel_name', 'Hotel Name', ['class' => 'control-label']) !!}
                        {!! Form::text('hotel_name', $value = $hotel->hotel_name, ['class' => 'form-control', 'rows' =>
                        3]) !!}

                        {!! Form::label('service_included', 'service', ['class' => 'control-label']) !!}
                        {!! Form::textarea('service_included', $value = $hotel->service_included, ['class' =>
                        'form-control','placeholder'=>'Service Include', 'rows' => 5]) !!}
                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('level', 'level', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('level', 1, 5, $hotel->level, ['class'=> 'form-control']) !!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('address_id', 'Address', ['class' => 'control-label']) !!}
                                {!!Form::select('size', ['L' => 'Núi BV', 'S' => 'Đảo XC'], $hotel->address_id,
                                ['class'=>
                                'form-control'])!!}
                            </div>
                        </div>
                        {!! Form::label('info', 'info', ['class' => 'control-label']) !!}
                        {!! Form::textarea('info', $value = $hotel->info, ['class' => 'form-control','placeholder'
                        =>'info Hotel','rows' => 5]) !!}
                        {!! Form::label('main_info', 'Main Info', ['class' => 'control-label']) !!}
                        {!! Form::textarea('main_info', $value = $hotel->main_info, ['class' =>
                        'form-control','placeholder'
                        =>'MainInfo Hotel', 'rows' => 5]) !!}
                        {!! Form::label('general_rule', 'General Rule', ['class' => 'control-label']) !!}
                        {!! Form::textarea('general_rule', $value = $hotel->general_rule, ['class' =>
                        'form-control','placeholder'=>'General Rule Hotel', 'rows' => 5]) !!}
                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('place_around', 'Place Around', ['class' => 'control-label']) !!}
                                {!!Form::select('size', ['L' => 'Núi BV', 'S' => 'Đảo XC'], $value =
                                $hotel->place_around,
                                ['multiple'=>true,'class'=> 'form-control'])!!}
                            </div>

                            <div class="col-sm-4 ">
                                {!! Form::label('rate', 'rate', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('rate', 1, 5, $value=$hotel->rate, ['class'=> 'form-control']) !!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('status', 'status', ['class' => 'control-label']) !!}
                                {!!Form::select('size', ['0' => 'Hoạt động', '1' => 'Không hoạt động'],
                                $value=$hotel->status,
                                ['class'=>
                                'form-control'])!!}
                            </div>
                        </div>
                        <div>
                            {!! Form::label('main_image', 'Main Image', ['class' => 'control-label']) !!}
                            {!! Form::file('main_image',['class'=>'form-control']) !!}
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