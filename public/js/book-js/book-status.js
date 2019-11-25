    $('body').wrapInner();
    $(document).ready(function() {
        initSelectStatus();
    })

    initSelectStatus = function() {
        $selectBook = $("[name='book_status']");
        $selectBook.each(function($index) {
            $valueSelect = $(this).val();
            $options = $(this).children("option");

            switch ($valueSelect) {
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
                default:
                    console.log("no action");
                    break;
            }

        })
    }


    setOptions = function($options, $id) {
        $options.each(function() {
            $(this).show();
        })
        if ($id == 1) {
            $options.each(function() {
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
            })
        }
        if ($id == 2) {
            $options.each(function() {
                if ($(this).val() == 1) {
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
            })
        }
        if ($id == 3) {
            $options.each(function() {
                if ($(this).val() == 1) {
                    $(this).hide();
                }
                if ($(this).val() == 2) {
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
            })
        }
        if ($id == 4) {
            $options.each(function() {
                if ($(this).val() == 1) {
                    $(this).hide();
                }
                if ($(this).val() == 2) {
                    $(this).hide();
                }
                if ($(this).val() == 3) {
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
            })
        }
        if ($id == 5) {
            $options.each(function() {
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
            })
        }
        if ($id == 6) {
            $options.each(function() {

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
                if ($(this).val() == 9) {
                    $(this).hide();
                }

            })
        }
        if ($id == 7 || $id == 8) {
            $options.each(function() {
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
                if ($(this).val() == 9) {
                    $(this).hide();
                }

            })
        }
        if ($id == 9) {
            $options.each(function() {
                $(this).hide();
            })
        }
    }

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
                            key: select.value
                        },
                        beforeSend: function() {
                            // setting a timeout

                        },
                        success: function(data) {
                            console.log(data.result);
                            initSelectStatus();
                        },
                        error: function() {

                        },
                        complete: function() {

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