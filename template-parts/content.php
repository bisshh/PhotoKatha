<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthaawaj
 */

?>

<article class="row" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<div class="col-md-9 border-right">

		<?php get_template_part('template-parts/single-heading');?>

		<?php if (has_post_thumbnail( $post->ID ) ): ?>
			<div class="img-area mb-3" itemscope="" itemtype="http://schema.org/ImageObject">
				<?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>
				<img src="<?php echo $image[0]; ?>" alt="" class="img-fluid">	
				<div class="fill" style="background-image: url('<?php echo $image[0]; ?>')"></div>
			</div>
		<?php endif; ?>

		<?php if ( is_active_sidebar( 'after-feature-image' ) ) : ?>
			<div class="rd-ads">
				<?php dynamic_sidebar('after-feature-image');?>
			</div>
		<?php endif; ?>
		<div class="news-detail">	
		<?php
		the_content(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'healthaawaj' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			)
		);
		?>
		<br>
		
		<?php if( get_field('video_link') ): ?>
			<div class="rd-video">
				<?php the_field('video_link'); ?>
			</div>
			<div class="clearfix"></div>
			<br><br>
			<?php else : ?>			
		<?php endif; ?>

		<span><strong>Category : </strong>
			<?php $taxonomy = 'category';

			// Get the term IDs assigned to post.
			$post_terms = wp_get_object_terms( $post->ID, $taxonomy, array( 'fields' => 'ids' ) );
				
			// Separator between links.
			$separator = ', ';
				
			if ( ! empty( $post_terms ) && ! is_wp_error( $post_terms ) ) {
				
				$term_ids = implode( ',' , $post_terms );
				
				$terms = wp_list_categories( array(
					'title_li' => '',
					'style'    => 'none',
					'echo'     => false,
					'taxonomy' => $taxonomy,
					'include'  => $term_ids
				) );
				
				$terms = rtrim( trim( str_replace( '<br />',  $separator, $terms ) ), $separator );
				
				// Display post categories.
				echo  $terms;
			} ?>
		</span>
		<br>
		<?php 
			if( $tags = get_the_tags() ) {
				echo '<strong>Tag :</strong> ';
				foreach( $tags as $tag ) {
					$sep = ( $tag === end( $tags ) ) ? '' : ', ';
					echo '<a href="' . get_term_link( $tag, $tag->taxonomy ) . '">#' . $tag->name . '</a>' . $sep;
				}
			}
		?>
		</div>
		<?php if ( is_active_sidebar( 'after-content' ) ) : ?>
			<div class="rd-ads">
				<?php dynamic_sidebar('after-content');?>
			</div>
		<?php endif; ?>
		<hr>
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<div class="addthis_inline_share_toolbox"></div>
		<hr>
		<div class="news-detail">
		<div class="rd-fb-comments">
			<h3><i class="fad fa-comments"></i> Write Your Comment</h3>
			<div class="fb-comments" data-href="<?php echo get_permalink() ?>" data-numposts="5" data-width="100%"></div>
		</div>
		<hr>
		<?php get_template_part('related');?><!-- /related post -->
		</div>
	</div>

	<div class="col-md-3">
		<div class="rd-popular">
			<?php get_template_part('template-parts/popular');?> <!-- /Popular News -->
		</div>
		<div class="rd-ads">
			<?php dynamic_sidebar('sidebar');?>
		</div>
	</div>

	<?php if ( is_active_sidebar( 'before-trending' ) ) : ?>
		<div class="col-md-12">
			<div class="rd-ads">
				<?php dynamic_sidebar('before-trending');?>
			</div>
		</div>
	<?php endif; ?>		
</article><!-- #post-<?php the_ID(); ?> -->
