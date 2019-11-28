changeEditCombo = function (value) {
    console.log($('#comboLink').attr("href"))
    var oldLink = $('#comboLink').attr("href");
    var arrOldLink = oldLink.split("/");
    var newLink = arrOldLink[0] + "/" + arrOldLink[1] + "/" + arrOldLink[2] + "/" + arrOldLink[3] + "/" + arrOldLink[4] + "/" + value + "/" + arrOldLink[6];
    console.log(value)
    console.log(newLink)
    $('#comboLink').prop('href', newLink);
}