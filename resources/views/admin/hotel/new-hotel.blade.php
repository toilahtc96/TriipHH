@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>{{__('Add New Hotel')}}</h2>

        <div class="panel panel-primary ">

            <div class="panel-heading">{{__('add Hotel For Website')}}</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="{!! asset('bower_components/images/kissclipart-hotel-clipart-hotel-clip-art-243e5c97e85fab97.jpg') !!}"
                                alt="" width="244" height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['method' => 'post', 'action' => 'HotelController@index', 'files' => true,
                        'class' => 'form-horizontal']) !!}

                        {!! Form::label('hotel_name', 'Hotel Name', ['class' => 'control-label']) !!}
                        {!! Form::text('hotel_name', $value = "", ['class' => 'form-control', 'rows' => 3]) !!}

                        {!! Form::label('service_included', 'service', ['class' => 'control-label']) !!}
                        {!! Form::textarea('service_included', $value = "", ['class' =>
                        'form-control','placeholder'=>'Service Include', 'rows' => 5]) !!}
                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('level', 'level', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('level', 1, 5, null, ['class'=> 'form-control']) !!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('address_id', 'Address', ['class' => 'control-label']) !!}
                                {!!Form::select('size', $locations, null, ['class'=>
                                'form-control'])!!}
                            </div>
                        </div>
                        {!! Form::label('info', 'info', ['class' => 'control-label']) !!}
                        {!! Form::textarea('info', $value = "", ['class' => 'form-control','placeholder'
                        =>'info Hotel',
                        'rows' => 5]) !!}
                        {!! Form::label('main_info', 'Main Info', ['class' => 'control-label']) !!}
                        {!! Form::textarea('main_info', $value = "", ['class' => 'form-control','placeholder'
                        =>'MainInfo Hotel', 'rows' => 5]) !!}
                        {!! Form::label('general_rule', 'General Rule', ['class' => 'control-label']) !!}
                        {!! Form::textarea('general_rule', $value = "", ['class' =>
                        'form-control','placeholder'=>'General Rule Hotel', 'rows' => 5]) !!}
                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('place_around', 'Place Around', ['class' => 'control-label']) !!}
                                {!!Form::select('size',$locations, null,
                                ['multiple'=>true,'class'=> 'form-control'])!!}
                            </div>

                            <div class="col-sm-4 ">
                                {!! Form::label('rate', 'rate', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('rate', 1, 5, null, ['class'=> 'form-control']) !!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('status', 'status', ['class' => 'control-label']) !!}
                                {!!Form::select('size', ['0' => 'Hoạt động', '1' => 'Không hoạt động'], null,
                                ['class'=>
                                'form-control'])!!}
                            </div>
                        </div>
                        <div>
                            {!! Form::label('main_image', 'Main Image', ['class' => 'control-label']) !!}
                            <div id="myfileupload">
                                <div>

                                    {!!
                                    Form::file('main_image',['onchange'=>"readURL(this);",'class'=>'form-control','id'=>'uploadfile'])
                                    !!}
                                </div>
                                <!--      Name  mà server request về sẽ là ImageUpload-->

                            </div>
                            @include('admin.common.image-upload')
                        </div>

                        <div class="div-multi-image">
                            {!! Form::label('list_image', 'List Image', ['class' => 'control-label']) !!}
                            <div id="myfileupload">
                                <div>

                                    {!!
                                    Form::file('list_image',['onchange'=>"readMultiURL(this,event);",'class'=>'form-control','id'=>'uploadMultifile','multiple'])
                                    !!}
                                </div>
                                <!--      Name  mà server request về sẽ là ImageUpload-->

                            </div>
                            @include('admin.common.multi-image-upload')
                        </div>

                        <div class="mt-3 mb-3">
                            {!!Form::submit('Submit', ['class' => 'btn btn-large btn-primary openbutton
                            form-control','onClick'=>'getValue()'])!!}
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