function readMultiURL(input, e) {
    if (!e.target.files) return;

    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);

    //print if any file is selected previosly 

    filesArr.forEach(function (f) {
        storedFiles.push(f);
    });

    if (storedFiles) { //Sử dụng  cho Firefox - chrome

        var files = storedFiles; //FileList object
        $output = $('#lstImage');
        $newList = $output.find('#lstImageNew');
        $newList.html(""); /// doan nay conflict khi edit

        // them 1 div cho new khi onchange
        //khi xoa nay thi chi xoa new

        // $('#uploadMultifile').attr('files', storedFiles);

        const dt = new DataTransfer();
        for (let file of storedFiles) {
            dt.items.add(file)
        }
        if (dt.files.length) {
            input.files = dt.files;
        }


        for (var i = 0; i < files.length; i++) {
            var file = files[i];

            //Only pics
            if (!file.type.match('image')) continue;
            var picReader = new FileReader();
            picReader.addEventListener("load", function (event) {
                var picFile = event.target;
                $div = $('<div></div>').attr('class', 'child div-child-image');
                $img = $('<img></img>').attr('height', '100').attr('width', '100').attr('alt', 'Child image').attr('src', picFile.result);
                $a = $('<a></a>').attr('class', 'removeOneimg').attr('href', 'javascript:').attr('style', 'display: inline');
                $div.append($img);
                $div.append($a);
                $newList.append($div);
            });
            picReader.readAsDataURL(file);
        }
    }
    $("#lstImage").show();
}

$(document).on('click', "a.removeOneimg", function () {

    //get parrent => get input hidden => if have => get value => get index of old_iamge => if  != -1 => cat khoi chuoi => return
    if ($('#list_image_old').length > 0) {
        $list_image_old = $('#list_image_old').val().split(",");
    }
    $uploadMultifile = $('#uploadMultifile');
    $div_child_image = $(this).parent(); //lay ra div chua img va aRemove
    $ip_old = $div_child_image.find("input");
    $div_parent = $(this).parent().parent(); //lay ra div chua img va aRemove
    if ($ip_old.length == 0) {

        // console.log($div_parent);
        $index = $div_child_image.index();
        if (storedFiles[$index]) {
            storedFiles.splice(storedFiles[$index], 1);
        }


        const dt = new DataTransfer();
        for (let file of storedFiles) {
            dt.items.add(file)
        }
        if (dt.files.length) {
            $uploadMultifile.files = dt.files;
        }
    } else {
        //TH nay la lay image old

        $imageOldVal = $ip_old.val();
        $indexImage = $list_image_old.indexOf($imageOldVal);
        if ($indexImage != -1) {

            // delete here index
            $list_image_old.splice($indexImage, 1);

            $('#list_image_old').val($list_image_old);
        }
    }
    $div_child_image.remove(); // xoa di
});

var storedFiles;
$(document).ready(function () {
    storedFiles = [];
    $(".ChoiceMultifile").bind('click', function () { //Chọn file khi .ChoiceMultifile Click
        $("#uploadMultifile").click();

    });
})