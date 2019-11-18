$(document).on('change', "#uploadfile", function() {
    $('#main_image_hidden').remove();
})


$(document).ready(function() {
    // 
    var list_image_old = $('#list_image_old').val().split(",");

    $lstImageDiv = $('#lstImage');
    for (i = 0; i < list_image_old.length; i++) {

        $div = $('<div></div>').attr('class', 'child div-child-image');
        $img = $('<img></img>').attr('height', '100').attr('width', '100').attr('alt', 'Child image').attr('src', '/images/hotels/' + list_image_old[i]);
        $a = $('<a></a>').attr('class', 'removeOneimg').attr('href', 'javascript:').attr('style', 'display: inline');
        $inputHiden = $('<input></input>').attr('value', list_image_old[i]).attr('type', 'hidden').attr('class', 'ip-child-old');
        $div.append($img);
        $div.append($a);
        $div.append($inputHiden);
        $lstImageDiv.append($div);
    }
});