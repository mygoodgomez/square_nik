$(function() {
	window.scroll(0,235);
	$('#photo_bar_container').attr('style', 'background:url('+headerImage+')');

	$(window).on('scroll', function(e) {
		onScrollHandler();
	});

	selectAlbumCovers();

	for(var i = 0; i < allHeaderImages.length; i++) {
		new Image().src = allHeaderImages[i];
	}
});

function onScrollHandler() {
	var scrolled = $(window).scrollTop();
	var scrollLimit = 255;

	var $navbar = $('#expanded_nav_bar');
	var $elementsToAnimate = $('#expanded_nav_bar, #lastfm_badge_wrapper');

	if(scrolled > scrollLimit && $navbar.is(":visible")) {
		$elementsToAnimate.stop().animate({top:"-50"}, function(elem) {
			$elementsToAnimate.hide();
		});
	}
	else if(scrolled < scrollLimit && !$navbar.is(":visible")) {
		$elementsToAnimate.show().stop().animate({top:"0"})
	}
}

function selectAlbumCovers() {
	var $covers = $('#lastfm_badge_wrapper ul li');
	
	var selectedCoverIds = [];

	while(selectedCoverIds.length < 9) {
		var index = Math.floor(Math.random()*($covers.length));
		if($.inArray(index, selectedCoverIds) === -1) {
			selectedCoverIds.push(index);
		}
	}

	var $newCovers = $('<ul id="#lastfm_badge_wrapper"></ul>')
	for(var i = 0; i < $covers.length; i++) {
		if($.inArray(i, selectedCoverIds) !== -1) {
			$newCovers.append($covers[i]);
		}
	}

	$('#lastfm_badge_wrapper ul').html($newCovers.html()).css('display','inline');
	$('#lastfm_badge_wrapper').show();
}