function readMultiURL(input, e) {
    if (!e.target.files) return;

    var files = e.target.files;
    var filesArr = Array.prototype.slice.call(files);

    //print if any file is selected previosly 

    filesArr.forEach(function(f) {
        storedFiles.push(f);
    });

    if (storedFiles) { //Sử dụng  cho Firefox - chrome

        var files = storedFiles; //FileList object
        var output = document.getElementById("lstImage");
        output.innerHTML = ""; /// doan nay conflict khi edit
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
            picReader.addEventListener("load", function(event) {
                var picFile = event.target;
                var div = document.createElement("div");
                div.setAttribute('class', ' child div-child-image')
                div.innerHTML = "<img height='100' src='" + picFile.result + "'" + "width='100' alt='Child image' id='list-image-" + i++ + "'" + " style='' " + "'/>";
                var aRemove = document.createElement("a");
                // aRemove.setAttribute('type', 'button');
                aRemove.setAttribute('class', 'removeOneimg');
                aRemove.setAttribute('href', 'javascript:');
                // aRemove.setAttribute('onclick', "removeThisImage(" + this + ")");
                aRemove.setAttribute('style', "display: inline")
                div.appendChild(aRemove);

                output.insertBefore(div, null);
            });
            picReader.readAsDataURL(file);
        }
    }
    $("#lstImage").show();
}

$(document).on('click', "a.removeOneimg", function() {

    //get parrent => get input hidden => if have => get value => get index of old_iamge => if  != -1 => cat khoi chuoi => return

    $list_image_old = $('#list_image_old').val().split(",");
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
    console.log($('#list_image_old').val());
    $div_child_image.remove(); // xoa di
});

var storedFiles;
$(document).ready(function() {
    storedFiles = [];
    $(".ChoiceMultifile").bind('click', function() { //Chọn file khi .ChoiceMultifile Click
        $("#uploadMultifile").click();

    });
})