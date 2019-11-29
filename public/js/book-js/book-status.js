$('body').wrapInner();
$(document).ready(function () {
    initSelectStatus();
})

initSelectStatus = function () {
    $selectBook = $("[name='book_status']");
    $selectBook.each(function ($index) {
        $valueSelect = $(this).parent().find("[name='book_status_hidden']").val();
        $options = $(this).children("option");

        switch ($valueSelect) {
            case "0":
                setOptions($options, "0");

                break;
            case "1":
                setOptions($options, "1");

                break;
            case "2":
                setOptions($options, "2");
                break;
            case "3":
                setOptions($options, "3");
                break;
            case "4":
                setOptions($options, "4");
                break;
            case "5":
                setOptions($options, "5");
                break;
            case "6":
                setOptions($options, "6");
                break;
            case "7":
                setOptions($options, "7");
                break;
            case "8":
                setOptions($options, "8");
                break;
            case "9":
                setOptions($options, "9");
                break;
            case "10":
                setOptions($options, "10");
                break;
            default:
                console.log("no action");
                break;
        }
        $(this).val('0');

    })
}


setOptions = function ($options, $id) {
    $options.each(function () {
        $(this).show();
    })
    if ($id == 0) {
        $options.each(function () {
            if ($(this).val() == 1) {
                $(this).hide();
            }
            if ($(this).val() == 3) {
                $(this).hide();
            }
            if ($(this).val() == 4) {
                $(this).hide();
            }
            if ($(this).val() == 5) {
                $(this).hide();
            }
            if ($(this).val() == 9) {
                $(this).hide();
            }
            if ($(this).val() == 10) {
                $(this).hide();
            }
        })
    }
    if ($id == 1) {
        $options.each(function () {
            if ($(this).val() == 1) {
                $(this).hide();
            }
            if ($(this).val() == 3) {
                $(this).hide();
            }
            if ($(this).val() == 4) {
                $(this).hide();
            }
            if ($(this).val() == 5) {
                $(this).hide();
            }
            if ($(this).val() == 9) {
                $(this).hide();
            }
            if ($(this).val() == 10) {
                $(this).hide();
            }
        })
    }
    if ($id == 2) {
        $options.each(function () {
            if ($(this).val() == 1) {
                $(this).hide();
            }
            if ($(this).val() == 2) {
                $(this).hide();
            }
            if ($(this).val() == 4) {
                $(this).hide();
            }
            if ($(this).val() == 5) {
                $(this).hide();
            }
            if ($(this).val() == 6) {
                $(this).hide();
            }
            if ($(this).val() == 7) {
                $(this).hide();
            }
            if ($(this).val() == 9) {
                $(this).hide();
            }
            if ($(this).val() == 10) {
                $(this).hide();
            }
        })
    }
    if ($id == 3) {
        $options.each(function () {
            if ($(this).val() == 1) {
                $(this).hide();
            }
            if ($(this).val() == 2) {
                $(this).hide();
            }
            if ($(this).val() == 3) {
                $(this).hide();
            }
            if ($(this).val() == 5) {
                $(this).hide();
            }
            if ($(this).val() == 6) {
                $(this).hide();
            }
            if ($(this).val() == 7) {
                $(this).hide();
            }
            if ($(this).val() == 9) {
                $(this).hide();
            }
            if ($(this).val() == 10) {
                $(this).hide();
            }
        })
    }
    if ($id == 4) {
        $options.each(function () {
            if ($(this).val() == 1) {
                $(this).hide();
            }
            if ($(this).val() == 2) {
                $(this).hide();
            }
            if ($(this).val() == 3) {
                $(this).hide();
            }
            if ($(this).val() == 4) {
                $(this).hide();
            }
            if ($(this).val() == 6) {
                $(this).hide();
            }
            if ($(this).val() == 7) {
                $(this).hide();
            }
            if ($(this).val() == 9) {
                $(this).hide();
            }
            if ($(this).val() == 10) {
                $(this).hide();
            }
        })
    }
    if ($id == 5) {
        $options.each(function () {

            if ($(this).val() == 1) {
                $(this).hide();
            }
            if ($(this).val() == 2) {
                $(this).hide();
            }
            if ($(this).val() == 3) {
                $(this).hide();
            }
            if ($(this).val() == 4) {
                $(this).hide();
            }
            if ($(this).val() == 5) {
                $(this).hide();
            }
            if ($(this).val() == 6) {
                $(this).hide();
            }
            if ($(this).val() == 7) {
                $(this).hide();
            }
            if ($(this).val() == 10) {
                $(this).hide();
            }
        })
    }
    if ($id == 6) {
        $options.each(function () {
            $(this).hide();
        })
    }

    if ($id == 7 || $id == 8) {

        $options.each(function () {
            $(this).hide();
        })
    }
    if ($id == 9) {
        $options.each(function () {

            if ($(this).val() == 1) {
                $(this).hide();
            }
            if ($(this).val() == 2) {
                $(this).hide();
            }
            if ($(this).val() == 3) {
                $(this).hide();
            }
            if ($(this).val() == 4) {
                $(this).hide();
            }
            if ($(this).val() == 5) {
                $(this).hide();
            }

            if ($(this).val() == 8) {
                $(this).hide();
            }
            if ($(this).val() == 7) {
                $(this).hide();
            }
            if ($(this).val() == 9) {
                $(this).hide();
            }
        })
    }
}

var preVar;
getOldVal = function (select, e) {
    this.preVar = select.value;
    select.blur();
}
getAction = function (select, e) {
    e.preventDefault();
    var select = e.target;
    var id = select.getAttribute('id');
    var idModal = '#modal_status_' + id;

    var trParent = $(select).parent().parent().parent();
    var tdStatus = trParent.find("td.td-status");
    var inputHidden = trParent.find('.book_status_hidden');
    $(idModal).modal('show');
    $cancel = $(idModal).find('#cancel');
    $cancel.click(function () {
        e.target.value = preVar;
    })
    $confirm = $(idModal).find('#confirm');
    $valueSelect = select.value;
    var i = 0; // sure code not rerun
    var idTable = document.getElementsByTagName("table")[0].getAttribute("id");
    $confirm.click(function () {
        if (i == 0) {
            i++;
            $confirmMsg = $(idModal).find('#confirm-msg').val();
            if ($valueSelect == 4) {
                $roomCode = $(idModal).find('#room-code-msg').val();
                $cinDate = $(idModal).find('#check_in_date').val();
                $cinTime = $(idModal).find('#check_in_time').val();
                $coutDate = $(idModal).find('#check_out_date').val();
                $coutTime = $(idModal).find('#check_out_time').val();

                if ($roomCode == "" || $cinDate == "" || $cinTime == "" || $coutDate == "" || $coutTime == "") {
                    alert('Bạn phải nhập đủ thông tin yêu cầu để thực hiện! ');
                    $cancel.click();
                }

            }


            if ($confirmMsg.toUpperCase() == 'OK') {
                // call ajax here
                var data = {}
                if ($valueSelect == 4) {
                    data = {
                        roomcode: $roomCode,
                        cinDate: $cinDate,
                        cinTime: $cinTime,
                        coutDate: $coutDate,
                        coutTime: $coutTime,
                        key: select.value,
                        id: id
                    }
                } else {
                    data = {
                        key: select.value,
                        id: id
                    }
                }


                $.ajax({
                    type: 'POST',
                    url: '/admin/changeBookStatus',
                    data: data,
                    beforeSend: function () {
                        // setting a timeout

                    },
                    success: function (data) {
                        var newStatus = data.statusNew.status;
                        var newIdStatus = data.idStatusNew;
                        inputHidden.val(newIdStatus);
                        tdStatus[0].innerHTML = newStatus;
                        $("#" + idTable).load(window.location + " #" + idTable, function () {
                            initSelectStatus();
                        });
                    },
                    error: function () {

                    },
                    complete: function () {

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

// searchTable = function () {

//     $startdate = $('#startdate').val();
//     $enddate = $('#enddate').val();
//     $q = $('#q').val();
//     console.log($startdate + ' - ' + $enddate + ' - ' + $q)

//     var data = {}
//     if ($startdate != "") {
//         data['startdate'] = $startdate
//     }
//     if ($enddate != "") {
//         data['enddate'] = $enddate
//     }
//     if ($q != "") {
//         data['q'] = $q
//     }
//     var idTable = document.getElementsByTagName("table")[0].getAttribute("id");
//     data['table'] = idTable;
//     $.ajax({
//         type: 'POST',
//         url: '/admin/search',
//         data: data,
//         beforeSend: function () {
//             // setting a timeout

//         },
//         success: function (response) {
//             alert(1)
//             // $('.collapse').collapse('show');
//             $("#container ").html(response);
//         }, 
//         error: function () {

//         },
//         complete: function () {

//         }
//     });

// }