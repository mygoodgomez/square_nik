
<header>
	<div id="nav_bar">
		<h1><a href="<?php echo home_url(); ?>">NG</a></h1>
	</div>
	<div id="expanded_nav_bar">
		<ul id="pages_list">
		<?php wp_list_pages(array('title_li'=>'')); ?>
		</ul>
		<span class="symbol search_icon">S</span>
		<?php # bloginfo( 'description' ); ?>
		<?php # get_search_form(); ?>
	</div>

	<div id="lastfm_badge_wrapper">
		<a class="symbol music_icon" href="http://www.last.fm/user/Niksterg11/charts?rangetype=week&subtype=albums" target="_blank">M</a>
		<ul>
			<?php 
				if(function_exists('ilastfm')) {
					ilastfm(); 
				}
				else {
			?>
			<li><a href="http://www.last.fm/music/Moby/Go%3A+The+Very+best+Of+Moby" title="Moby - Go: The Very best Of Moby"><img src="http://nikgomez.com/wordpress/wp-content/plugins/ilastfm/cache/33287511.png" class="lastfm_album art4" alt="Moby - Go: The Very best Of Moby" /></a></li>
			<li><a href="http://www.last.fm/music/The+Knife/Deep+Cuts" title="The Knife - Deep Cuts"><img src="http://nikgomez.com/wordpress/wp-content/plugins/ilastfm/cache/42446651.png" class="lastfm_album art5" alt="The Knife - Deep Cuts" /></a></li>
			<li><a href="http://www.last.fm/music/Kelis/Flesh+Tone" title="Kelis - Flesh Tone"><img src="http://nikgomez.com/wordpress/wp-content/plugins/ilastfm/cache/45030287.png" class="lastfm_album art6" alt="Kelis - Flesh Tone" /></a></li>
			<?php } ?>
		</ul>
	</div>


	<div id="photo_bar_container"></div>
</header>

<div id="wrapper">
