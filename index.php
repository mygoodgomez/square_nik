<?php
/**
 * The main template file
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file 
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ): ?>

<ol>
<?php while ( have_posts() ) : the_post(); ?>
	<li>
		<article>
			<div class="article_title">
				<?php
				if(the_title('','',false) == '') {
					echo '<span class="smaller">from</span>';
				}
				else {
					echo '<span class="title_icon symbol">~</span>';					
				}
				?>
				<h3><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h3>
				<?php nik_date();?>
			</div>
			<div class="post_content">
				<?php the_content(); ?>
			</div>
		</article>
	</li>
<?php endwhile; ?>
</ol>
<div id="pagination_container">
	<?php
	global $wp_query;

	$big = 999999999; // need an unlikely integer

	echo paginate_links( array(
		'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
		'format' => '?paged=%#%',
		'current' => max( 1, get_query_var('paged') ),
		'total' => $wp_query->max_num_pages,
		'prev_text' => '« Prev',
		'next_text' => 'Next »'

	) );
	?>
</div>
<?php else: ?>
<h2>No posts to display</h2>
<?php endif; ?>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer') ); ?>