if ($(window).width() >= 992) {
$('ul.nav li.dropdown').hover(function () {
        $(this).find('.dropdown-menu').stop(true, true).fadeIn(300);
    }, function () {
        $(this).find('.dropdown-menu').stop(true, true).fadeOut(300);
		//$(this).find('.dropdown-submenu .dropdown-menu').css("display", "none");
    });
	/*$('ul.nav li.dropdown-submenu').hover(function () {
        //$(this).find('.dropdown-menu').stop(true, true).fadeIn(300);
		//$(this).find('.side-dropdown').css("display", "block");
    });*/
	
}

    $(".sub_chapter_name").hide();
    function toggle(id) {
        $(".sub_chapter_name").hide('slow');
        $("#content_" + id).toggle('slow');
    }
