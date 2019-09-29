$(document).ready(function () {

    $('.dropdown').mouseover(function () {
        $(this).addClass('open');
    }).mouseout(function () {
        $(this).removeClass('open');
    });

    $('.datepicker').datepicker({
        format: 'yyyy-mm-dd',
        endDate: '0d'
    });

    $("#hukum_date").change(function () {
        var date = this.value;

        var url = hukum_url+'?dt='+ date;
        window.location.href = url;
    });

    check_lareevar();
    check_social();
    shareicons();
    sharecounticons();

});

function check_lareevar() {
    if (lareevar_assist_sess == 'on') {
        var $hasclass = $('#lareevar_assist').hasClass('lareevar-off');
        if ($hasclass == true) {
            $('[data-lareevar-obj="1"]').toggleClass('');
        } else {

            $('[data-lareevar-obj="1"]').toggleClass('lareevar-on');
        }
    } else {

        var $hasclass = $('#lareevar_assist').hasClass('lareevar-off');
        if ($hasclass == true) {
            $('[data-lareevar-obj="1"]').toggleClass('');
        } else {
            $('[data-lareevar-obj="1"]').toggleClass('lareevar-on');
        }

    }
}

function lareevar_assist(el) {
    var $el = $(el);

    var request = $.ajax({
        url: base_url + 'public/preferences/lareevar-assist-session-set',
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

function remember_this() {

    var request = $.ajax({
        url: remember_me_url + 'ajax-remember-me/',

        data: {
            current_page: current_page
        },
        type: "GET"
    }).done(function (data) {
        alert('We bookmarked this page. You can also access this page later by clicking on the ang by ang (or) page by page links');
    });
}

function remember_this_bgv() {

    var request = $.ajax({
        url: remember_me_url + 'ajax-remember-me/',

        data: {
            current_page: current_page,
            current_vaar: current_vaar
        },
        type: "GET"
    }).done(function (data) {
        alert('We bookmarked this page. You can also access this page later by clicking on the ang by ang (or) page by page links');
    });
}

function loadPage(index) {

    if (index == undefined) {
        index = 0;
    }

    $(".header-social-share-page").jsSocials("shareOption", "twitter", "url", pagination_url + index);
    $(".header-social-share-page").jsSocials("shareOption", "facebook", "url", pagination_url + index);
    $(".header-social-share-page").jsSocials("shareOption", "googleplus", "url", pagination_url + index);
    $(".header-social-share-page").jsSocials("shareOption", "whatsapp", "url", pagination_url + index);

    $.ajax({
        url: pagination_url + index + '/ajax',
        dataType: 'json',
        success: function (data) {

            $('#page_body').empty();
            $('#page_body').html(data.content);

            if (typeof data.title != 'undefined' && data.title != null)
                $('title').html(data.title);

            if (typeof data.description != 'undefined' && data.description != null)
                $('meta[name="Description"]').attr('content', $.parseHTML(data.description)[0].textContent);

            if (typeof data.keywords != 'undefined' && data.keywords != null)
                $('meta[name="Keywords"]').attr('content', $.parseHTML(data.keywords)[0].textContent);
        }
    }).done(function () {
        check_lareevar();
        shareicons();
        check_social();
    });
}

function loadPage_bhai_gurdas(vaar, pauri) {
    if (vaar == undefined) {
        vaar = 1;
    }
    if (pauri == undefined) {
        pauri = 1;
    }

    $(".header-social-share-page").jsSocials("shareOption", "twitter", "url", pagination_url + vaar + '/pauri/' + pauri);
    $(".header-social-share-page").jsSocials("shareOption", "facebook", "url", pagination_url + vaar + '/pauri/' + pauri);
    $(".header-social-share-page").jsSocials("shareOption", "googleplus", "url", pagination_url + vaar + '/pauri/' + pauri);
    $(".header-social-share-page").jsSocials("shareOption", "whatsapp", "url", pagination_url + vaar + '/pauri/' + pauri);

    $.ajax({
        url: pagination_url + vaar + '/pauri/' + pauri + '/ajax',
        dataType: 'json',
        success: function (data) {
            $('#page_body').empty();
            $('#page_body').html(data.content);

            if (typeof data.title != 'undefined' && data.title != null)
                $('title').html(data.title);

            if (typeof data.description != 'undefined' && data.description != null)
                $('meta[name="Description"]').attr('content', $.parseHTML(data.description)[0].textContent);

            if (typeof data.keywords != 'undefined' && data.keywords != null)
                $('meta[name="Keywords"]').attr('content', $.parseHTML(data.keywords)[0].textContent);
        }
    }).done(function () {
        check_lareevar();
        shareicons();
        check_social();
    });
}

function loadPagebaanis(index) {

    if (index == undefined) {
        index = 0;
    }

    $(".header-social-share-page").jsSocials("shareOption", "twitter", "url", pagination_url + index);
    $(".header-social-share-page").jsSocials("shareOption", "facebook", "url", pagination_url + index);
    $(".header-social-share-page").jsSocials("shareOption", "googleplus", "url", pagination_url + index);
    $(".header-social-share-page").jsSocials("shareOption", "whatsapp", "url", pagination_url + index);

    $.ajax({
        url: pagination_url + index + '/ajax',
        dataType: 'json',
        success: function (data) {

            $('#baani_page').empty();
            $('#baani_page').html(data.content);

            if (typeof data.title != 'undefined' && data.title != null)
                $('title').html(data.title);

            if (typeof data.description != 'undefined' && data.description != null)
                $('meta[name="Description"]').attr('content', $.parseHTML(data.description)[0].textContent);

            if (typeof data.keywords != 'undefined' && data.keywords != null)
                $('meta[name="Keywords"]').attr('content', $.parseHTML(data.keywords)[0].textContent);

        }
    }).done(function () {
        shareicons();
        check_social();
    });

}

function check_social() {

    if (social_show_data == 'on' || social_show_data == 'yes') {
        $(".social-add").show();

        $(".shabad_view").show();
        $(".ang_view").show();
        $(".verse_view").show();
        $(".sharediv").show();
    } else {
        $(".social-add").hide();

        $(".shabad_view").hide();
        $(".ang_view").hide();
        $(".verse_view").hide();
        $(".sharediv").hide();
    }

}


function social_sharing(el) {

    var $el = $(el);

    var request = $.ajax({
        url: base_url + 'public/preferences/sharing-session-set',
        data: {
            sharing_session: $el.data('social')
        },
        type: "GET"
    }).done(function (msg) {

        if (msg == 'off') {
            $(".social-add").hide();
            $("#social-sharing button").html('Social Sharing On').data('social', 'on');

            $(".shabad_view").hide();
            $(".ang_view").hide();
            $(".verse_view").hide();
            $(".sharediv").hide();
            window.social_show_data = 'off';
        } else {
            $(".social-add").show();
            $("#social-sharing button").html('Social Sharing Off').data('social', 'off');

            $(".shabad_view").show();
            $(".ang_view").show();
            $(".verse_view").show();
            $(".sharediv").show();
            window.social_show_data = 'on';
        }

    });

}


function shareicons() {
    $('.shareRoundIcons').each(function () {
        var sharelink = $(this).data("sharelink");
        var whatsapp_sharelink = $(this).data("whastsappsharelink");
        var sharetext = $(this).data("sharetext");

        $(this).jsSocials({
            url: sharelink,
            text: sharetext,
            showLabel: false,
            showCount: false,
            shareIn: "popup",
            shares: ["twitter", "facebook", "googleplus", {share: "whatsapp", url: whatsapp_sharelink, text: sharetext}]
        });
    });
}

function sharecounticons() {
    var $header_share_elem = $('.header-social-share-page');
    var share_url = $header_share_elem.data('share-url');
    var share_text = $header_share_elem.data('share-text');

    $header_share_elem.jsSocials({
        url: share_url,
        text: share_text,
        showLabel: false,
        showCount: true,
        shareIn: "popup",
        shares: ["twitter", "facebook", "googleplus", "whatsapp"],
    });

}

