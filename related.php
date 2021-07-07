<div class="related-post">
	<div class="row d-flex justify-content-center">
		<div class="col-md-12">
			<div class="rd-title text-center">
				<h2><span>Related Post</span></h2>
			</div>
		</div>	
		<?php $i=0; $id=get_the_ID(); $allcat = wp_get_post_categories($id); $categoryarr = array_diff($allcat,array(2)); $args = array('showposts' => 8, 'cat'=>implode(',',$categoryarr),'post__not_in'=>array($id));$loop = new WP_Query( $args );while($loop->have_posts()): $loop->the_post(); ?>
		<div class="col-md-3">
			<div class="r-wrap">
				<div class="img-area">
				<a href="<?php the_permalink();?>">
					<img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-m-thumb' ); ?>" alt="<?php echo wp_trim_words( get_the_title(), 10 ); ?>" class="img-fluid rounded">
				</a>
				</div>
				<h4 class="d-line"><a href="<?php the_permalink();?>"><?php echo wp_trim_words( get_the_title(), 8 ); ?></a></h4>
			</div>
		</div>	
		<?php if(++$i%2==0){echo '';} endwhile; wp_reset_postdata();?>
	</div>
</div>
