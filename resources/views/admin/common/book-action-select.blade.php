<head>
    <meta name="csrf-token" content="{{csrf_token()}}" />
</head>
<div>
    {!!Form::select('book_status',['0'=>'Chọn Hành Động','1'=>'Nhận yêu cầu tư vấn','2'=>'Yêu cầu đặt cọc','3'=>'Yêu cầu
    mã phòng','4'=>'Yêu cầu thanh toán','5'=>'Gửi mail','6'=>'Khách hủy','7'=>'Khách sạn hủy',
    '8'=>'Hủy với lý do khác','9'=>'Hoàn tất','10'=>'Đặt xe'],
    0,['class'=> 'form-control','id' =>'book_status_'.$data->getTable().'_'. $data->id,
    'onfocus'=>'getOldVal(this,event)', 'onchange'=>'getAction(this,event)' ])!!}
    {!!Form::hidden('book_status_hidden',$data->book_status_id,['class'=>'book_status_hidden'])!!}
</div>

<div class="modal fade" id='modal_status_book_status_{{ $data->getTable()}}_{{ $data->id}}' tabindex="-1" role="dialog"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group">
                        <label for="confirm-msg" class="col-form-label">Confirm(ok):</label>
                        <input type="text" class="form-control" id="confirm-msg">
                    </div>
                    @if($data->book_status_id == 3)
                    <div class="form-group">
                        <label for="room-code-msg" class="col-form-label">Room Code:</label>
                        <input type="text" class="form-control" id="room-code-msg">
                    </div>
                    <div class="row">
                        <div class="col-sm-6 ">
                            {!! Form::label('check_in_date', 'CheckIn Date', ['class' => 'control-label']) !!}
                            {{ Form::date('check_in_date', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="col-sm-6 ">
                            {!! Form::label('check_in_time', 'CheckIn Time', ['class' => 'control-label']) !!}
                            {{ Form::time('check_in_time', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 ">
                            {!! Form::label('check_out_date', 'CheckOut Date', ['class' => 'control-label']) !!}
                            {{ Form::date('check_out_date', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="col-sm-6 ">
                            {!! Form::label('check_out_time', 'CheckOut Time', ['class' => 'control-label']) !!}
                            {{ Form::time('check_out_time', null, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    @endif

                    @if($data->book_status_id == 8)
                    <div class="form-group">
                        <label for="reject-note-msg" class="col-form-label">Reject Note:</label>
                        <input type="text" class="form-control" id="reject-note-msg">
                    </div>
                    @endif

                </form>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel">Close</button>
                <button type="button" class="btn btn-primary" id="confirm">Send message</button>
            </div>
        </div>
    </div>
</div>