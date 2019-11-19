function readURL(input, thumbimage) {


    if (input.files && input.files[0]) { //Sử dụng  cho Firefox - chrome
        var reader = new FileReader();


        reader.onload = function(e) {

            $("#thumbimage").attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    } else { // Sử dụng cho IE
        $("#thumbimage").attr('src', input.value);

    }
    $("#thumbimage").show();
    // $('.filename').text($("#uploadfile").val());
    $('.Choicefile').css('background', '#C4C4C4');
    $('.Choicefile').css('cursor', 'default');
    $(".removeimg").show();
    $(".Choicefile").unbind('click'); //Xóa sự kiện  click trên nút .Choicefile

}
$(document).ready(function() {
    $(".Choicefile").bind('click', function() { //Chọn file khi .Choicefile Click
        $("#uploadfile").click();

    });
    $(".removeimg").click(function() { //Xóa hình  ảnh đang xem
        $("#thumbimage").attr('src', '').hide();
        var nameOneImage = $('#uploadfile').attr('name');
        $("#myfileupload").html('<input type="file" id="uploadfile" name=' + nameOneImage + ' onchange="readURL(this);" />');
        $(".removeimg").hide();
        $(".Choicefile").bind('click', function() { //Tạo lại sự kiện click để chọn file
            $("#uploadfile").click();
        });
        $('.Choicefile').css('background', '#0877D8');
        $('.Choicefile').css('cursor', 'pointer');
        // $(".filename").text("");
    });
})