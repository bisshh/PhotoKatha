<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthaawaj
 */

get_header();
?>

	<?php if ( is_active_sidebar( 'before-breaking' ) ) : ?>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="rd-ads">
			  		<?php dynamic_sidebar('before-breaking');?>	
				</div>				
			</div>
		</div>
	</div>
	<?php endif;?>


	<?php if ( is_active_sidebar( 'after-breaking' ) ) : ?>	
	<div class="container">
		<div class="row">
			<div class="col-12">
				<div class="rd-ads">
					<?php dynamic_sidebar('after-breaking');?>
				</div>				
			</div>
		</div>
	</div> <!-- /advertisement -->
	<?php endif;?>
	
	<?php get_template_part('homepage/hot');?> <!-- /Hot -->
	
	<div class="container">
		<div class="row">
			<?php if ( is_active_sidebar( 'after-hot-top-full' ) ) : ?>	
			<div class="col-md-12">
				<div class="rd-ads">
					<?php dynamic_sidebar('after-hot-top-full');?>
				</div>
			</div>
			<?php endif;?>
			<?php if ( is_active_sidebar( 'after-hot-news-small-left' ) ) : ?>	
			<div class="col-md-6">
				<div class="rd-ads">
					<?php dynamic_sidebar('after-hot-news-small-left');?>
				</div>
			</div>
			<?php endif;?>
			<?php if ( is_active_sidebar( 'after-hot-news-small-right' ) ) : ?>	
			<div class="col-md-6">
				<div class="rd-ads">
					<?php dynamic_sidebar('after-hot-news-small-right');?>
				</div>
			</div>
			<?php endif;?>
			<?php if ( is_active_sidebar( 'after-hot-bottom-full' ) ) : ?>	
			<div class="col-md-12">
				<div class="rd-ads">
					<?php dynamic_sidebar('after-hot-bottom-full');?>
				</div>
			</div>
			<?php endif;?>
		</div>
	</div> <!--/ads-->

	<div class="home">
		<div class="container">
			<div class="row layout-1">
				<?php get_template_part('homepage/samachar');?> <!-- /Samachar -->
			</div>
			<div class="mar-40"></div>
			<div class="row">
				<?php if ( is_active_sidebar( 'after-cover-top-full' ) ) : ?>	
				<div class="col-md-12">
					<div class="rd-ads">
						<?php dynamic_sidebar('after-cover-top-full');?>
					</div>
				</div>
				<?php endif;?>
				<?php if ( is_active_sidebar( 'after-cover-small-left' ) ) : ?>	
				<div class="col-md-6">
					<div class="rd-ads">
						<?php dynamic_sidebar('after-cover-small-left');?>
					</div>
				</div>
				<?php endif;?>
				<?php if ( is_active_sidebar( 'after-cover-small-right' ) ) : ?>	
				<div class="col-md-6">
					<div class="rd-ads">
						<?php dynamic_sidebar('after-cover-small-right');?>
					</div>
				</div>
				<?php endif;?>
				<?php if ( is_active_sidebar( 'after-cover-bottom-full' ) ) : ?>	
				<div class="col-md-12">
					<div class="rd-ads">
						<?php dynamic_sidebar('after-cover-bottom-full');?>
					</div>
				</div>
				<?php endif;?>
			</div><!--/ads-->
			<div class="row hot">
				<div class="col-12">
					<div class="rd-title">
						<p><span>COVER </span>STORY</p>
					</div>
				</div>	
				<div class="col-md-12">
					<?php get_template_part('homepage/cover');?> <!-- /Hot -->
				</div>
			</div>
			<div class="row layout-2">
				<?php get_template_part('homepage/glamour');?> <!-- /Glamour -->
			</div>
			<div class="mar-40"></div>
			<div class="row">
				<?php if ( is_active_sidebar( 'after-glamour-top-full' ) ) : ?>	
				<div class="col-md-12">
					<div class="rd-ads">
						<?php dynamic_sidebar('after-glamour-top-full');?>
					</div>
				</div>
				<?php endif;?>
				<?php if ( is_active_sidebar( 'after-glamour-small-left' ) ) : ?>	
				<div class="col-md-6">
					<div class="rd-ads">
						<?php dynamic_sidebar('after-glamour-small-left');?>
					</div>
				</div>
				<?php endif;?>
				<?php if ( is_active_sidebar( 'after-glamour-small-right' ) ) : ?>	
				<div class="col-md-6">
					<div class="rd-ads">
						<?php dynamic_sidebar('after-glamour-small-right');?>
					</div>
				</div>
				<?php endif;?>
				<?php if ( is_active_sidebar( 'after-glamour-bottom-full' ) ) : ?>	
				<div class="col-md-12">
					<div class="rd-ads">
						<?php dynamic_sidebar('after-coglamourver-bottom-full');?>
					</div>
				</div>
				<?php endif;?>
			</div><!--/ads-->
			<div class="row layout-1">
				<?php get_template_part('homepage/photo-series');?> <!-- /Photo -->
			</div>
			<div class="mar-40"></div>
		</div>
	</div>
<?php
get_footer();
