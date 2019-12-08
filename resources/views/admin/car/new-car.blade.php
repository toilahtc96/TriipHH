@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>{{__('Thêm hãng Xe')}}</h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">{{__('Thêm hãng xe mới')}}</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="{!! asset('bower_components/images/kissclipart-hotel-clipart-hotel-clip-art-243e5c97e85fab97.jpg') !!}"
                                alt="" width="244" height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['method' => 'post', 'action' => 'CarController@index', 'files' => true,
                        'class' => 'form-horizontal']) !!}

                        {!! Form::label('own_car', 'Tên Hãng xe', ['class' => 'control-label']) !!}
                        {!! Form::text('own_car', $value = "", ['class' => 'form-control','placeholder' =>'Own Name'])
                        !!}

                        {!! Form::label('msisdn', 'Số điện thoại', ['class' => 'control-label']) !!}
                        {!! Form::text('msisdn', $value = "", ['class' => 'form-control','placeholder' =>'msisdn']) !!}

                        {!! Form::label('price', 'Giá niêm yết', ['class' => 'control-label']) !!}
                        {!! Form::number('price', $value = "", ['class' =>
                        'form-control','placeholder'=>'price', 'rows' => 5]) !!}

                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('starting_location_id', 'Điểm xuất phát', ['class' => 'control-label'])
                                !!}
                                {!!Form::select('starting_location_id', $locations, null, ['class'=>'form-control'])!!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('destination_id', 'Điểm đến', ['class' => 'control-label']) !!}
                                {!!Form::select('destination_id', $locations, null, ['class'=> 'form-control'])!!}
                            </div>
                        </div>
                        {!! Form::label('license_plates', 'Biển số xe ', ['class' => 'control-label']) !!}
                        {!! Form::text('license_plates', $value = "", ['class' => 'form-control','placeholder'
                        =>'Licanse Plate']) !!}

                        {!! Form::label('service_included', 'Dịch vụ', ['class' => 'control-label']) !!}
                        <textarea name=service_included id="text" cols="30" rows="10">

                        </textarea>

                        <div class="row">
                            <div class="col-sm-4 ">
                                {!! Form::label('start_pickup_location', 'Điểm đón khách', ['class' => 'control-label'])
                                !!}
                                {!!Form::select('start_pickup_location[]',$locations, null,
                                ['multiple'=>true,'class'=> 'form-control'])!!}
                            </div>

                            <div class="col-sm-4 ">
                                {!! Form::label('destination_pickup_location', 'Điểm trả khách', ['class' =>
                                'control-label']) !!}
                                {!!Form::select('destination_pickup_location[]',$locations,
                                null,['multiple'=>true,'class'=> 'form-control'])!!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('places_passing', 'Điểm đi qua', ['class' => 'control-label']) !!}
                                {!!Form::select('places_passing[]',$locations, null,
                                ['multiple'=>true,'class'=> 'form-control'])!!}
                            </div>

                        </div>

                        <div class="col-sm-4 ">
                            {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                            {!!Form::select('status', ['1' => 'Hoạt động', '0' => 'Không hoạt động'], null,
                            ['class'=> 'form-control'])!!}
                        </div>
                        <div class="col-sm-4 ">
                            {!! Form::label('direction', 'Chiều xe', ['class' => 'control-label']) !!}
                            {!!Form::select('direction', ['1' => 'Chiều đi', '0' => 'Chiều về'], null,
                            ['class'=> 'form-control'])!!}
                        </div>

                        {!! Form::label('count_seat', 'Số ghế', ['class' => 'control-label']) !!}
                        {!! Form::number('count_seat', $value = "", ['class' => 'form-control','placeholder' => 'Count
                        Seat']) !!}
                        {!! Form::label('car_type', 'Loại Xe', ['class' => 'control-label']) !!}
                        {!! Form::text('car_type', $value = "", ['class' => 'form-control','placeholder'=>'Car Type'])
                        !!}

                        {!! Form::label('slugs', 'Đường dẫn', ['class' => 'control-label']) !!}
                        {!! Form::text('slugs', $value = "", ['class' => 'form-control']) !!}
                        <div>
                            {!! Form::label('main_image', 'Ảnh chính', ['class' => 'control-label']) !!}
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
                            {!! Form::label('list_image', 'Ảnh kèm theo', ['class' => 'control-label']) !!}
                            <div id="myfileupload">
                                <div>

                                    {!!
                                    Form::file('list_image[]',['onchange'=>"readMultiURL(this,event);",'class'=>'form-control','id'=>'uploadMultifile','multiple'])
                                    !!}
                                </div>
                                <!--      Name  mà server request về sẽ là ImageUpload-->

                            </div>
                            @include('admin.common.multi-image-upload')
                        </div>

                        <div class="mt-3 mb-3">
                            {!!Form::submit('Đồng ý', ['class' => 'btn btn-large btn-primary openbutton
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