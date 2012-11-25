jQuery(document).ready(function($) {
	window.scroll(0,235);
	$('#photo_bar_container').attr('style', 'background:url('+headerImage+')');


	$(window).on('scroll', function(e) {
		onScrollHandler($);
	});
});

function onScrollHandler($) {
	var scrolled = jQuery(window).scrollTop();

	if(scrolled > 240) {
		$('#header_expanded').stop().fadeTo(250, 0);
		$('#header_minimized').stop().fadeTo(250, 1);
	}
	else {
		$('#header_expanded').stop().fadeTo(250, 1);
		$('#header_minimized').stop().fadeTo(250, 0);
	}
}
