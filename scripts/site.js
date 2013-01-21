$(function() {
	window.scroll(0,235);
	$('#photo_bar_container').attr('style', 'background:url('+headerImage+')');

	$(window).on('resize', function(e) {
		onResizeHandler();
	});

	selectAlbumCovers();

	for(var i = 0; i < allHeaderImages.length; i++) {
		new Image().src = allHeaderImages[i];
	}
});

function onResizeHandler() {
	selectAlbumCovers();
}

function selectAlbumCovers() {
	var $covers = $('#lastfm_badge_wrapper ul li');
	var coverWidth = $covers.first().outerWidth() + 10;
	var $navBar = $('#nav_bar');
	var $h1 = $navBar.find('h1');
	var $pagesList = $navBar.find('#pages_list');

	var coversAllowedWidth = $(window).width() - 200 - $h1.outerWidth() - $pagesList.outerWidth();
	console.log(coversAllowedWidth);
	
	$covers.each(function(i) {
		if((i * coverWidth) < coversAllowedWidth) {
			$(this).css({'display':'inline-block'});
		} else {
			$(this).css({'display':'none'});
		}
	});

	// var selectedCoverIds = [];

	// while(selectedCoverIds.length < 9) {
	// 	var index = Math.floor(Math.random()*($covers.length));
	// 	if($.inArray(index, selectedCoverIds) === -1) {
	// 		selectedCoverIds.push(index);
	// 	}
	// }

	// var $newCovers = $('<ul id="#lastfm_badge_wrapper"></ul>')
	// for(var i = 0; i < $covers.length; i++) {
	// 	if($.inArray(i, selectedCoverIds) !== -1) {
	// 		$newCovers.append($covers[i]);
	// 	}
	// }

	// $('#lastfm_badge_wrapper ul').html($newCovers.html()).css('display','inline');
}