<head><meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<div>
    <select name="book_status" id='book_status_{{ $data->id}}' class="form-control" onfocus="getOldVal(this,event)"
        onchange="getAction(this,event)">
        <option value="1">Nhận yêu cầu tư vấn</option>
        <option value="2">Yêu cầu đặt cọc</option>
        <option value="3">Yêu cầu mã phòng</option>
        <option value="4">Yêu cầu thanh toán </option>
        <option value="5">Gửi mail</option>
        <option value="6">Khách sạn hủy</option>
        <option value="7">Khách hủy</option>
        <option value="8">Hủy với lý do khác</option>
    </select>
</div>

<div class="modal fade" id='modal_status_book_status_{{ $data->id}}' tabindex="-1" role="dialog"
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
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" id="cancel">Close</button>
                <button type="button" class="btn btn-primary" id="confirm">Send message</button>
            </div>
        </div>
    </div>
</div>
<script src="{!! asset('bower_components/adminlte/plugins/jquery/jquery.min.js') !!}"></script>
<script>


    var preVar;
    getOldVal = function(select, e) {
        this.preVar = select.value;
        select.blur();
    }
    getAction = function(select, e) {
        e.preventDefault();
        var select = e.target;
        var id = select.getAttribute('id');
        var idModal = '#modal_status_' + id;
        $(idModal).modal('show');
        $cancel = $(idModal).find('#cancel');
        $cancel.click(function() {
            e.target.value = preVar;
        })
        $confirm = $(idModal).find('#confirm');

        var i = 0; // sure code not rerun
        $confirm.click(function() {
            if (i == 0) {
                i++;
                $confirmMsg = $(idModal).find('#confirm-msg').val();
                if ($confirmMsg.toUpperCase() == 'OK') {
                    // call ajax here

                    $.ajax({
                        type: 'POST',
                        url: 'changeBookStatus',
                        data: {
                            key: 2
                        },
                        success: function(data) {
                            console.log(data.result);
                        }
                    });

                    //end

                } else {
                    alert('Bạn phải nhập ok để thực hiện!');
                    $cancel.click();
                }
            }
            $(idModal).modal('hide');
        })
        $(idModal).find('#confirm-msg').val('');
    }
</script>