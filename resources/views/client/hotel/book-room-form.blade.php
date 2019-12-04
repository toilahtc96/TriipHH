<div id="myModal{{$room->id}}" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Đặt phòng hạng <span id="level">{{$room->level}} </span> của khách sạn
                    {{$hotel->hotel_name}}
                </h4>
            </div>
            <div class="modal-body">

                <div class="tab-content">

                    <div class="tab-content-inner active" data-content="signup" style="padding:0 10% 0 10%">
                        {!! Form::open(['method' => 'POST', 'action' => 'BookRoomClientController@index',
                        'class' => 'form-horizontal', 'id'=>'bookRoom']) !!}
                        <div class="row form-group">
                            <div class="col-md-12">
                                {!! Form::label('fullname', 'Tên của bạn', ['class' => 'control-label']) !!}
                                {!! Form::text('fullname', $value = "", ['class' => 'form-control','placeholder' =>'Nhập
                                tên bạn','id'=>'fullname'])
                                !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {!! Form::label('msisdn', 'Số điện thoại', ['class' => 'control-label']) !!}
                                {!! Form::text('msisdn', $value = "", ['class' => 'form-control','placeholder'
                                =>'msisdn']) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {!! Form::label('fb-link', 'Facebook', ['class' => 'control-label']) !!}
                                {!! Form::text('fb-link', $value = "", ['class' => 'form-control','placeholder'
                                =>'Facebook']) !!}
                            </div>
                        </div>


                        <div class="row form-group">
                            <div class="col-md-12">
                                {!! Form::label('start_date', 'Ngày đi', ['class' => 'control-label']) !!}
                                {!! Form::date('start_date', $value = "", ['class' =>
                                'form-control','placeholder'=>'Ngày đi','format'=>'dd/mm/yyyy']) !!}
                            </div>
                        </div>

                        <div class="row form-group">
                            <div class="col-md-6">
                                {!! Form::label('adult', 'Người lớn', ['class' => 'control-label']) !!}
                                {!!Form::selectRange('adult', 1, 10, ['class' => 'form-control'])!!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-6">
                                {!! Form::label('children', 'Trẻ em dưới 6 tuổi', ['class' => 'control-label']) !!}
                                {!! Form::selectRange('children', 1, 10 ,['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {!! Form::label('type_service', 'Bạn muốn nhận tư vấn tại đâu?', ['class' =>
                                'control-label']) !!}
                                <div class="row">
                                    <div class="col-md-4">
                                        {!! Form::radio('type_service','0') !!}
                                        {!! Form::label('type_service', 'Điện thoại')!!}

                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::radio('type_service','1') !!}
                                        {!! Form::label('type_service', 'Facebook')!!}
                                    </div>
                                    <div class="col-md-4">
                                        {!! Form::radio('type_service','2') !!}
                                        {!! Form::label('type_service', 'Zalo')!!}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-md-12">
                                {!! Form::label('price', 'Giá dự kiến', ['class' => 'control-label']) !!}
                                {!! Form::text('price', $value = $room->price . 'K / 1 Đêm / 1 Người lớn',['class' =>
                                'form-control','disabled'=>'true']) !!}
                            </div>
                        </div>

                        <div class="mt-3 mb-3">
                            {!!Form::button('Đồng ý', ['class' => 'btn btn-primary
                            btn-block','onClick'=>'submitBookRoom()'])!!}
                            {!! Form::close() !!}
                        </div>

                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align:center">
                Chân thành cảm ơn bạn đã tin tưởng chúng tôi!
            </div>
        </div>

    </div>
</div>

<script>
    submitBookRoom = function(){
        $('#fullname').focus();
        alert(1);
    
    }
</script>