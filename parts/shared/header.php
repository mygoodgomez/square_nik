
<header>
	<div id="nav_bar">
		<h1><a href="<?php echo site_url(); ?>">NG</a></h1>
	</div>
	<div id="expanded_nav_bar">
		<ul id="pages_list">
		<?php wp_list_pages(array('title_li'=>'')); ?>
		</ul>
		<span class="symbol search_icon">S</span>
		<?php # bloginfo( 'description' ); ?>
		<?php # get_search_form(); ?>
	</div>

	<div id="photo_bar_container"></div>
</header>

<div id="wrapper">
