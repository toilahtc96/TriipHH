@extends('admin.admin_template_layout')
@section('content')
<div class="container body">
    <div class="main_container">

        <h2>{{__('Thêm mới combo')}}</h2>
        @include('admin.common.url-to-list')
        <div class="panel panel-primary ">

            <div class="panel-heading">{{__('Thêm mới chương trình combo ')}}</div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-4">
                        <figure style="margin: 0 4px 0;text-align: center;">
                            <img src="{!! asset('bower_components/images/kissclipart-hotel-clipart-hotel-clip-art-243e5c97e85fab97.jpg') !!}"
                                alt="" width="244" height="244" class="j9NuTc TrZEUc">
                        </figure>

                    </div>
                    <div class="col-sm-6">
                        {!! Form::open(['method' => 'post', 'action' => 'ComboTripController@index', 'files' => true,
                        'class' => 'form-horizontal']) !!}

                        {!! Form::label('hotel_id', 'Khách sạn', ['class' => 'control-label']) !!}
                        {!!Form::select('hotel_id', $hotels, null, ['class'=>'form-control','onchange'=>'callRoomAjax(this,event)'])!!}
                        {{-- 'testSwitch(this,event) --}}
                        {!! Form::label('room_id', 'Hạng phòng', ['class' => 'control-label']) !!}
                        {!!Form::select('room_id', $rooms, null, ['class'=>'form-control'])!!}

                        {!! Form::label('car_id', 'Xe', ['class' => 'control-label']) !!}
                        {!!Form::select('car_id', $cars, null, ['class'=>'form-control'])!!}

                        {!! Form::label('combo_type_id', 'Số này đi', ['class' => 'control-label']) !!}
                        {!!Form::select('combo_type_id', $combotypes, null, ['class'=>'form-control'])!!}

                        <div class="row">
                            <div class="col-sm-6 ">

                        {!! Form::label('start_time', 'Giờ bắt đầu ', ['class' => 'control-label']) !!}
                        {!! Form::time('start_time', $value = "", ['class' =>'form-control']) !!}
                            </div>
                        <div class="col-sm-6 ">
                        {!! Form::label('arrival_time', 'Giờ dự kiến đến', ['class' => 'control-label']) !!}
                        {!! Form::time('arrival_time', $value = "", ['class' =>'form-control']) !!}

                        </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6 ">

                        {!! Form::label('start_date', 'Ngày bắt đầu ', ['class' => 'control-label']) !!}
                        {!! Form::date('start_date', \Carbon\Carbon::now()->format('D/M/Y'), ['class' => 'form-control']) !!}
                            </div>
                        <div class="col-sm-6 ">
                        {!! Form::label('end_date', 'Ngày kết thúc ', ['class' => 'control-label']) !!}
                        {!! Form::date('end_date', \Carbon\Carbon::now()->format('D/M/Y'), ['class' =>'form-control']) !!}

                        </div>
                        </div>
                        {!! Form::label('service_included', 'Dịch vụ', ['class' => 'control-label']) !!}
                       
						<textarea name=service_included id="text" cols="30" rows="10">
                           
                        </textarea>
                        {!! Form::label('slugs', 'Đường dẫn', ['class' => 'control-label']) !!}
                        {!! Form::text('slugs', $value = "", ['class' => 'form-control']) !!}
                        <div class="row">
                            <div class="col-sm-4 ">

                                {!! Form::label('price', 'Giá', ['class' => 'control-label']) !!}
                                {!! Form::number('price', $value = "", ['class' =>
                                'form-control','placeholder'=>'price']) !!}
                            </div>
                            <div class="col-sm-4 ">
                                {!! Form::label('status', 'Trạng thái', ['class' => 'control-label']) !!}
                                {!!Form::select('status', ['1' => 'Hoạt động', '0' => 'Không hoạt động'], null,
                                ['class'=>'form-control'])!!}
                            </div>
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