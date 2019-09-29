$(document).ready(function () {

    $("#new_psw").keyup(function () {
        var new_psw = $("#new_psw").val();
        var re_enter_password = $("#re_enter_password").val();
        if (new_psw == re_enter_password) {
            $("#re_enter_password").css("border-color", "green");

        } else {
            $("#re_enter_password").css("border-color", "red");
        }
    });

    $("#re_enter_password").keyup(function () {
        var new_psw = $("#new_psw").val();
        var re_enter_password = $("#re_enter_password").val();
        if (new_psw == re_enter_password) {
            $("#re_enter_password").css("border-color", "green");

        } else {
            $("#re_enter_password").css("border-color", "red");
        }
    });

    $("#change_password").validate({
        ignore: [],
        errorContainer: $('#errorContainer'),
        errorLabelContainer: $('#errorContainer ul'),
        wrapper: 'li',
        onfocusout: false,
        highlight: function (element, errorClass) {
            $(element).addClass(errorClass);
        },
        unhighlight: function (element, errorClass) {
            $(element).removeClass(errorClass);
        },
        rules: {
            old_psw: 'required',
            new_psw: 'required',
            re_enter_password: 'required'

        },
        submitHandler: function (form) {
            form.submit();
        }
    });

});