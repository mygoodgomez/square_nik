<?php
	/**
	 * Starkers functions and definitions
	 *
	 * For more information on hooks, actions, and filters, see http://codex.wordpress.org/Plugin_API.
	 *
 	 * @package 	WordPress
 	 * @subpackage 	Starkers
 	 * @since 		Starkers 4.0
	 */

	/* ========================================================================================================================
	
	Required external files
	
	======================================================================================================================== */

	require_once( 'external/starkers-utilities.php' );

	/* ========================================================================================================================
	
	Theme specific settings

	Uncomment register_nav_menus to enable a single menu with the title of "Primary Navigation" in your theme
	
	======================================================================================================================== */

	add_theme_support('post-thumbnails');
	
	// register_nav_menus(array('primary' => 'Primary Navigation'));

	/* ========================================================================================================================
	
	Actions and Filters
	
	======================================================================================================================== */

	add_action( 'wp_enqueue_scripts', 'script_enqueuer' );

	add_filter( 'body_class', 'add_slug_to_body_class' );

	/* ========================================================================================================================
	
	Custom Post Types - include custom post types and taxonimies here e.g.

	e.g. require_once( 'custom-post-types/your-custom-post-type.php' );
	
	======================================================================================================================== */



	/* ========================================================================================================================
	
	Scripts
	
	======================================================================================================================== */

	/**
	 * Add scripts via wp_head()
	 *
	 * @return void
	 * @author Keir Whitaker
	 */

	function script_enqueuer() {
		// wp_register_script( 'site', get_template_directory_uri().'/scripts/site.js', array( 'jquery' ) );
		// wp_enqueue_script( 'site' );

		// wp_register_style( 'screen', get_template_directory_uri().'/style.css', '', '', 'screen' );
  //       wp_enqueue_style( 'screen' );
	}	

	/* ========================================================================================================================
	
	Comments
	
	======================================================================================================================== */

	/**
	 * Custom callback for outputting comments 
	 *
	 * @return void
	 * @author Keir Whitaker
	 */
	function starkers_comment( $comment, $args, $depth ) {
		$GLOBALS['comment'] = $comment; 
		?>
		<?php if ( $comment->comment_approved == '1' ): ?>	
		<li>
			<article id="comment-<?php comment_ID() ?>">
				<?php echo get_avatar( $comment ); ?>
				<h4><?php comment_author_link() ?></h4>
				<time><a href="#comment-<?php comment_ID() ?>" pubdate><?php comment_date() ?> at <?php comment_time() ?></a></time>
				<?php comment_text() ?>
			</article>
		<?php endif;
	}


	function get_nik_header_images($getOne = false) {
		$imageDir = get_template_directory_uri().'/images/';
		$images = array(
					'mexico_house',
					'san_fran_landscape',
					'san_fran_landscape_2',
					'concert_heads',
					'geo_windows',
					'india_street',
					'mexico_border_fence',
					'mosque_gold',
					'turkey_dome',
					);
		if($getOne) {
			$imageIndex = rand(0,sizeof($images)-1);
			return $imageDir . $images[$imageIndex] . '.jpg';
		}
		else {
			foreach($images as $k=>$v) {
				$images[$k] = $imageDir . $images[$k] . '.jpg';
			}
			return json_encode($images);
		}
	}

	function nik_date() {
		$dateString = "<abbr class='datetime' title='".get_the_date('F j, Y', '', '', false).' at '.get_the_date('g:i a', '', '', false)."'>".get_the_date("M j 'y", '', '', false)."</abbr>";
		echo $dateString;
	}