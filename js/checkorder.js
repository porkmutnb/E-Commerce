$(document).ready(function () {

});

function printorder() {
    var text = "";
    text = $('#username').text();
    text = text+"|"+$('#detail').text();
    text = text+"|"+$('#date').text();
    text = text+"|"+$('#address').text();
    text = text+"|"+$('#phone').text();
    text = text+"|"+$('#price').text();

    $('#sendvalue').val(text);

    $('#formdata').submit();
}