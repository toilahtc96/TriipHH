@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>Edit ComboTrip</h2>

        <div class="panel panel-primary ">

            <div class="panel-heading">Edit ComboTrip</div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="https://ssl.gstatic.com/accounts/signup/glif/account.svg" alt="" width="244" height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">

                        {{ Form::model($combotrip, array('route' => array('combotrips.update', $combotrip->id), 'method' => 'PUT','files' => true)) }}



                        {!! Form::hidden('image_root_folder',$value =
                                    $combotrip->image_root_folder,['class'=>'form-control','id'=>'image_root_folder'])
                                    !!}
                        
                        {!! Form::label('hotel_id', 'Hotel', ['class' => 'control-label']) !!}
                        {!!Form::select('hotel_id', $hotels, $combotrip->hotel_id, ['class'=>'form-control','onchange'=>'callRoomAjax(this,event)'])!!}
                        {{-- 'testSwitch(this,event) --}}
                        {!! Form::label('room_id', 'Room', ['class' => 'control-label']) !!}
                        {!!Form::select('room_id', $rooms, $combotrip->room_id, ['class'=>'form-control'])!!}

                        {!! Form::label('car_id', 'Car', ['class' => 'control-label']) !!}
                        {!!Form::select('car_id', $cars, $value=$combotrip->car_id, ['class'=>'form-control'])!!}

                        {!! Form::label('combo_type_id', 'Combo Type', ['class' => 'control-label']) !!}
                        {!!Form::select('combo_type_id', $combotypes, $value=$combotrip->combo_type_id, ['class'=>'form-control'])!!}

                        <div class="row">
                            <div class="col-sm-6 ">

                        {!! Form::label('start_time', 'Start Time', ['class' => 'control-label']) !!}
                        {!! Form::time('start_time', $value=$combotrip->start_time, ['class' =>'form-control']) !!}
                            </div>
                        <div class="col-sm-6 ">
                        {!! Form::label('arrival_time', 'Arrival Time', ['class' => 'control-label']) !!}
                        {!! Form::time('arrival_time', $value=$combotrip->arrival_time, ['class' =>'form-control']) !!}

                        </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 ">

                        {!! Form::label('start_date', 'Start Date', ['class' => 'control-label']) !!}
                        {!! Form::date('start_date', $value=$combotrip->start_date, ['class' => 'form-control']) !!}
                            </div>
                        <div class="col-sm-6 ">
                        {!! Form::label('end_date', 'End Date ', ['class' => 'control-label']) !!}
                        {!! Form::date('end_date', $value=$combotrip->end_date, ['class' =>'form-control']) !!}

                        </div>
                        </div>
                        {!! Form::label('service_included', 'service', ['class' => 'control-label']) !!}
                        {!! Form::textarea('service_included', $value =$combotrip->service_included, ['class' =>
                        'form-control','placeholder'=>'Service Include', 'rows' => 5]) !!}

                        <div class="row">
                            <div class="col-sm-4 ">

                                {!! Form::label('price', 'Price', ['class' => 'control-label']) !!}
                                {!! Form::number('price', $value =$combotrip->price, ['class' =>
                                'form-control','placeholder'=>'price']) !!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('status', 'status', ['class' => 'control-label']) !!}
                                {!!Form::select('status', ['1' => 'Hoạt động', '0' => 'Không hoạt động'], $value =$combotrip->status,
                                ['class'=>'form-control'])!!}
                            </div>
                        </div>

                        <div class="mt-3 mb-3">

                            <div class="div-multi-image">
                                {!! Form::label('list_image', 'List Image', ['class' => 'control-label']) !!}
                                <div id="myfileupload">
                                    <div>

                                        {!!
                                        Form::file('list_image[]',['onchange'=>"readMultiURL(this,event);",'class'=>'form-control','id'=>'uploadMultifile','multiple'])
                                        !!}

                                        {{-- $value = $hotel->list_image --}}
                                        {!!
                                        Form::hidden('list_image_old',$value = $combotrip->list_image,['id'=>'list_image_old']);
                                        !!}
                                    </div>
                                    <!--      Name  mà server request về sẽ là ImageUpload-->

                                </div>
                                @include('admin.common.multi-image-upload')
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