testSwitch = function(tswitch, e) {
    var isChecked = tswitch.getAttribute("checked");
    var idLB = tswitch.getAttribute("id");
    $labelThis = $('#' + idLB).parent().find("label");

    var param = tswitch.getAttribute("id").split("Switch");
    if (param.length == 2) {
        var tableRecord = param[0];
        var idRecord = param[1];
        // Chuyen tu unCheck => check
        if (isChecked === null) {
            tswitch.setAttribute("checked", "checked");
            $labelThis.html("Hoạt động");
            callAjax(e, tableRecord, idRecord, 1);

            // call ajax for status 1
        } else {
            tswitch.removeAttribute("checked");
            $labelThis.html("Không hoạt động");
            callAjax(e, tableRecord, idRecord, 0);
            // call ajax for status 0
        }
    } else {
        alert("Có lỗi khi cài đặt trạng thái ! Vui lòng liên hệ đội phát triển!");
    }
}
var request;

$.ajaxSetup({

    headers: {

        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

    }

});

callAjax = function(e, table, id, status) {
    e.preventDefault();


    $.ajax({

        type: 'POST',

        url: '/admin/changeStatus',

        data: { table: table, id: id, status: status },

        success: function(data) {

            alert(data.result);

        },
        error: function() {
            alert("có lỗi");
        }

    });
}

callRoomAjax = function(hotel, e) {
    e.preventDefault();
    $.ajax({

        type: 'POST',

        url: '/admin/getRoomByHotelId',

        data: { id: hotel.value },

        success: function(data) {
            var arr = [];
            console.log((data.data[3]));
            console.log(typeof(data.data));
            arr.push(data.data);
            $('#room_id').empty();
            if (Object.values(data.data).length > 1) {
                $.each(data.data, function(key, value) {
                    if (key == 0) {
                        $('#room_id').append('<option value="' + key + '">' + value + '</option>');
                    } else { $('#room_id').append('<option value="' + key + '">' + value + ' Sao' + '</option>'); }
                });
            } else {
                $('#room_id').append('<option value="">' + "Không có loại phòng thuộc khách sạn này" + '</option>');
            }
        }

    });
}