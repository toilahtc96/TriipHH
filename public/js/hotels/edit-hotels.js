$(document).on('change', "#uploadfile", function () {
    $('#main_image_hidden').remove();
})


$(document).ready(function () {
    // 
    console.log($('#list_image_old').val() );
    if ($('#list_image_old').val() !== undefined) {
        var list_image_old = $('#list_image_old').val().split(",");
        var image_root_folder = $('#image_root_folder').val();
        console.log(image_root_folder);
        $lstImageDiv = $('#lstImage');
        $listOld = $lstImageDiv.find('#lstImageOld');
        for (i = 0; i < list_image_old.length; i++) {
            if (list_image_old[i] != "") {
                $div = $('<div></div>').attr('class', 'child div-child-image');
                $img = $('<img></img>').attr('height', '100').attr('width', '100').attr('alt', 'Child image').attr('src', '/images/' + image_root_folder + '/' + list_image_old[i]);
                $a = $('<a></a>').attr('class', 'removeOneimg').attr('href', 'javascript:').attr('style', 'display: inline');
                $inputHiden = $('<input></input>').attr('value', list_image_old[i]).attr('type', 'hidden').attr('class', 'ip-child-old');
                $div.append($img);
                $div.append($a);
                $div.append($inputHiden);
                $listOld.append($div);
            }
        }
    }
});

document.addEventListener("DOMContentLoaded", function (event) {
    //do work
    var image_root_folder = $('#image_root_folder').val();
    var main_image = $('#main_image_hidden').val();
    if (main_image != undefined && main_image != "") {
        $('#thumbimage').attr('src', '/images/' + image_root_folder + '/' + main_image);
        readURL('/images/' + image_root_folder + '/' + main_image);

    }
});