<div class="col-12">
    <div class="rd-title">
        <p><span>GLA</span>MOUR</p>
    </div>
</div>							
<?php $i=0; $args = array('showposts' =>4, 'cat' => '6');
    $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) : 
            while($loop->have_posts()): 
                $loop->the_post();
?>
<div class="col-3">
    <div class="image">
        <a href="<?php the_permalink();?>"><img alt="<?php the_title();?>" class="img-fluid" src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-l-thumb' ); ?>" alt="<?php the_title();?>"></a>
        <div class="teaser">
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
        </div>
    </div>
</div>
<?php endwhile;
    endif; 
        wp_reset_postdata();
?>