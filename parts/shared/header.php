
<header>
	<div id="header_minimized">
		<h1><a href="<?php echo site_url(); ?>">NG</a></h1>
	</div>
	
	<div id="header_expanded">
		<h1><a href="<?php echo site_url(); ?>">NG<?php # bloginfo( 'name' ); ?></a></h1>
		<ul id="pages_list">
		<?php 
		wp_list_pages(array(
						'title_li'=>'',

						));
		?>
		</ul>
		<?php # bloginfo( 'description' ); ?>
		<?php # get_search_form(); ?>
	</div>

	<div id="photo_bar_container"></div>
</header>

<div id="wrapper">
