<div class="hot">
	<div class="container">
		<div class="owl-carousel">
			<?php $i=0; $args = array('showposts' =>4, 'meta_query' => array(
        array(
            'key'   => 'hot',
            'value' => '1',
        )
    ));
                    $loop = new WP_Query( $args );
                        if ( $loop->have_posts() ) : 
                            while($loop->have_posts()): 
                                $loop->the_post();
                ?>
			<div class="item">
				<div class="image">
					<a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-m-thumb' ); ?>" alt="" class="img-fluid"></a>
					<div class="teaser">
						<span><?php
							$category = get_the_category();
							$first_category = $category[0];
							echo sprintf( '<a href="%s">%s</a>', get_category_link( $first_category ), $first_category->name );
						?></span>
						<h2><a href="<?php the_permalink();?>"><?php echo get_the_title(); ?></a></h2>
						<p><?php if( get_field('author_name') ): ?>
								<?php the_field('author_name'); ?>
								<?php else : ?>	
								<?php the_author_posts_link(); ?>
							<?php endif; ?>, <?php echo the_date("l, Y F d"); ?></p>
					</div>						
				</div>
			</div>
			<?php endwhile;
                    endif; 
                        wp_reset_postdata();
                ?>
		</div>
		<script>
			$('.owl-carousel').owlCarousel({
				loop:true,
				margin:25,
				autoplay:true,
				autoplayTimeout:5000,
				autoplayHoverPause:true,
				responsive:{
					0:{
						items:1
					},
					1024:{
						items:3
					}
				}
			})
		</script>
	</div>
</div>