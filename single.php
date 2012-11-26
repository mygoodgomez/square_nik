<?php
/**
 * The Template for displaying all single posts
 *
 * Please see /external/starkers-utilities.php for info on get_template_parts()
 *
 * @package 	WordPress
 * @subpackage 	Starkers
 * @since 		Starkers 4.0
 */
?>
<?php get_template_parts( array( 'parts/shared/html-header', 'parts/shared/header' ) ); ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

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
	<?php comments_template( '', true ); ?>
</article>

<?php endwhile; ?>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>