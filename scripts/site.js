$(function() {
	window.scroll(0,235);
	$('#photo_bar_container').attr('style', 'background:url('+headerImage+')');

	$(window).on('scroll', function(e) {
		onScrollHandler();
	});

});

function onScrollHandler() {
	var scrolled = $(window).scrollTop();

	var $navbar = $('#expanded_nav_bar');
	if(scrolled > 240 && $navbar.is(":visible")) {
		$navbar.stop().fadeOut(200);
	}
	else if(scrolled < 240 && !$navbar.is(":visible")) {
		$navbar.stop().fadeIn(200);
	}
}
