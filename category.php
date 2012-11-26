<?php
/**
 * The template for displaying Category Archive pages
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
<h2>Category Archive: <?php echo single_cat_title( '', false ); ?></h2>
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
<?php else: ?>
<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
<?php endif; ?>

<?php get_template_parts( array( 'parts/shared/footer','parts/shared/html-footer' ) ); ?>