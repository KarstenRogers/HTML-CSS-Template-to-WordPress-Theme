<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package bootstrapwp
 */

get_header(); ?>

<?php 
if ( has_post_thumbnail() ) {
	$bg_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
}
?> 

<div class="pagewrap" style="background-image: url('<?php echo $bg_url[0]; ?>')">
			<header>

			<?php if (rwmb_meta('dwp_banner_text') != '') {
				echo '<h1>';
				echo rwmb_meta('dwp_banner_text');
				echo '<h1>';
			} else { 
				 the_title( '<h1 class="entry-title">', '</h1>' ); 
		} ?>
	  		</header>	    
			</div><!-- /headerwrap -->
			
			<?php echo $banner_text; ?>

<div class="container">
<div class="row">
	<section id="primary" class="col-md-9 col-lg-9">
		<main id="main" class="site-main" role="main">

			<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'content', 'page' ); ?>

				<?php
					// If comments are open or we have at least one comment, load up the comment template
					if ( comments_open() || '0' != get_comments_number() ) :
						comments_template();
					endif;
				?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
