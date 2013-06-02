$(function() {
	window.scroll(0,240);
	$('#photo_bar_container').attr('style', 'background:url('+headerImage+')');
	$('.wp-caption').css({'width':''});
	selectAlbumCovers();
	repositionNavBar();	

	for(var i = 0; i < allHeaderImages.length; i++) {
		new Image().src = allHeaderImages[i];
	}

	$(window).on('resize', function(e) {
		onResizeHandler();
	});
	$(window).on('scroll', function(e) {
		onScrollHandler();
	});
	// $('.lastfm_album').on('mouseover', function(e) {
	// 	albumArtMouseoverHandler(e);
	// });
	// $('.lastfm_album').on('mouseout', function(e) {
	// 	albumArtMouseoutHandler(e);
	// });
});

function onResizeHandler() {
	selectAlbumCovers();
}

function onScrollHandler() {
	repositionNavBar();	
}

function selectAlbumCovers() {
	var maxCoversToShow = 10;
	var $covers = $('#lastfm_badge_wrapper ul li');
	var coverWidth = $covers.first().outerWidth() + 10;
	var $navBar = $('#nav_bar');
	var $h1 = $navBar.find('h1');
	var $pagesList = $navBar.find('#pages_list');

	var coversAllowedWidth = $(window).width() - 175 - $h1.outerWidth() - $pagesList.outerWidth();
	
	$covers.each(function(i) {
		if((i * coverWidth) < coversAllowedWidth && i < maxCoversToShow) {
			$(this).css({'display':'inline-block'});
		} else {
			$(this).css({'display':'none'});
		}
	});
}

function repositionNavBar() {
	var scrollVert = $(window).scrollTop();
	var photoBarContainerHeight = $('#photo_bar_container').height();
	var navBarHeight = $('#nav_bar').outerHeight();


	if(scrollVert + navBarHeight < photoBarContainerHeight) {
		if(/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
			$('#nav_bar').animate({ top: scrollVert-300 }, 250);
		} else {
			$('#nav_bar').css({'top':scrollVert-300});
		}
	}
}

function albumArtMouseoverHandler(event) {
	var $album = $(event.currentTarget);
	var $info = $album.parents('li').find('.info');
	$info.fadeIn();
}
function albumArtMouseoutHandler(event) {
	var $album = $(event.currentTarget);
	var $info = $album.parents('li').find('.info');
	$info.fadeOut();
}