<div class="col-12">
    <div class="rd-title">
        <p><span>PORT</span>FOLIO</p>
    </div>
</div>							
<?php $i=0; $args = array('showposts' =>2, 'cat' => '8');
    $loop = new WP_Query( $args );
        if ( $loop->have_posts() ) : 
            while($loop->have_posts()): 
                $loop->the_post();
?>
<div class="col-md-6">
    <div class="image">
        <a href="<?php the_permalink();?>"><img alt="<?php the_title();?>" class="img-fluid" src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-l-thumb' ); ?>" alt="<?php the_title();?>"></a>
        <div class="teaser">
            <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
            <p><?php echo wp_trim_words(get_the_excerpt(),20,'');?> ..</p>
        </div>
    </div>
</div>
<?php endwhile;
    endif; 
        wp_reset_postdata();
?>