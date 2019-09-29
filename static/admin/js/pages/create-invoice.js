$(document).ready(function () {
    $("#create_bill").validate({
        ignore: [],
        errorContainer: $('#errorContainer'),
        errorLabelContainer: $('#errorContainer ul'),
        wrapper: 'li',
        onfocusout: false,
        highlight: function (element, errorClass) {
            $(element).addClass(errorClass);
            $(element.form).find("label[for=" + element.id + "]").addClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
            $(element.form).find("label[for=" + element.id + "]").removeClass(errorClass);
        }
    });
});