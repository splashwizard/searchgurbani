$(document).ready(function () {

    check_lareevar();
});

function check_lareevar() {
    if (lareevar_assist_sess == 'on') {
        var $hasclass = $('#lareevar_assist').hasClass('lareevar-off');
        if($hasclass == true){
            $('[data-lareevar-obj="1"]').toggleClass('');
        }else{

            $('[data-lareevar-obj="1"]').toggleClass('lareevar-on');
        }
    }else{

        var $hasclass = $('#lareevar_assist').hasClass('lareevar-off');
        if($hasclass == true){
            $('[data-lareevar-obj="1"]').toggleClass('');
        }else{
            $('[data-lareevar-obj="1"]').toggleClass('lareevar-on');
        }

    }
}

function lareevar_assist(el) {
    var $el = $(el);

    var request = $.ajax({
        url: base_url +'lareevar-session-set/lareevar-assist-session',
        data: {
            lareevar_assist: $el.data('lareevar') == 'on' ? 'off' : 'on'
        },
        type: "GET"
    }).done(function (msg) {

        $el.data('lareevar', msg);

        if (msg == 'on') {
            $el.removeClass('lareevar-off');
            $el.addClass('lareevar-on');
            $('[data-lareevar-obj="1"]').toggleClass('lareevar-on');
        }
        else {
            $el.removeClass('lareevar-on');
            $el.addClass('lareevar-off');
            $('[data-lareevar-obj="1"]').toggleClass('lareevar-on');
        }
    });
}

function gotoPage(formobj, event) {
    var page_no = formobj.page_no.value;
    loadPage(page_no);
    return false;
}

function save_as_pdf() {
    var url = 'http://savepageaspdf.pdfonline.com/pdfonline/pdfonline.asp?cURL=' + current_url + '&author_id=4BBE928B-5648-4890-BDA9-E8793072D7B4&pageOrientation=0&topMargin=0.5&bottomMargin=0.5&leftMargin=0.5&rightMargin=0.5';
    window.open(url, '_blank', 'width=600,height=400,scrollbars=yes,status=yes,resizable=yes,screenx=0,screeny=0');
    return false;
}

function remember_this() {
    $.ajax({
        url: pagination_url + 'ajax-remember-me/' + current_page,
        success: function (data) {
            alert('We bookmarked this page. You can also access this page later by clicking on the ang by ang (or) page by page links');
        }
    });
}

function loadPage(index) {

    if (index == undefined) {
        index = 0;
    }
    $.ajax({
        url: pagination_url + index + '/ajax',
        success: function (data) {
            $('#page_body').empty();
            $('#page_body').html(data);
        }
    }).done(function(){
        check_lareevar();
    });
}

function loadPage_bhai_gurdas(vaar,pauri) {
    if (vaar == undefined) {
        vaar = 1;
    }
    if (pauri == undefined) {
        pauri = 1;
    }

    $.ajax({
        url: pagination_url + vaar + '/pauri/' + pauri + '/ajax',
        success: function (data) {
            $('#page_body').empty();
            $('#page_body').html(data);
        }
    }).done(function(){
        check_lareevar();
    });
}

function loadPagebaanis(index) {

    if (index == undefined) {
        index = 0;
    }
    // $('#loader').html("<img border='0' src="+ base_url + "images/loading.gif>");
    $.ajax({
        url: pagination_url + index + '/ajax',
        success: function (data) {

            $('#baani_page').empty();
            $('#baani_page').html(data);
            // $('#loader').html("");
        }
    });

}
