function pad(char) {
    var prevVal = $('#keyword').val();
    $('#keyword').eq(0).val(prevVal + char).trigger("input");
    $('#keyword').focus();
}
