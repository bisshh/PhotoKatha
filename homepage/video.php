<div class="rd-title mb-3">
    <h2><span><i class="fad fa-video"></i> झिल्को टीभी</span><a href="/category/video/" class="rd-morebtn">थप <i class="fad fa-angle-right"></i></a></h2>
</div>	
<!-- Flickity HTML init -->
<div class="carousel carousel-main" data-flickity>
    <?php $i=0; $args = array('showposts' =>5);
        $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) : 
                while($loop->have_posts()): 
                    $loop->the_post();
    ?>
    <?php if( get_field('video_link') ): ?>
    <div class="carousel-cell flex-video">
        <?php the_field('video_link'); ?>
    </div>
    <?php else : ?>			
        <?php endif; ?>
    <?php endwhile;
        endif; 
            wp_reset_postdata();
    ?>
</div>
    
<div class="carousel mt-3 carousel-nav" data-flickity='{ "asNavFor": ".carousel-main", "contain": true, "pageDots": false }'>
    <?php $i=0; $args = array('showposts' =>7);
        $loop = new WP_Query( $args );
            if ( $loop->have_posts() ) : 
                while($loop->have_posts()): 
                    $loop->the_post();
    ?>
    <?php if( get_field('video_link') ): ?>
    <div class="carousel-cell d-flex align-items-center">
        <?php
            $video = get_field( 'video_link' );

            preg_match('/src="(.+?)"/', $video, $matches_url );
            $src = $matches_url[1];	
            
            preg_match('/embed(.*?)?feature/', $src, $matches_id );
            $id = $matches_id[1];
            $id = str_replace( str_split( '?/' ), '', $id );
            
            // var_dump( $id );
        ?>
        <img class="img-fluid" src="http://img.youtube.com/vi/<?php echo $id; ?>/mqdefault.jpg">
    </div>	
    <?php else : ?>			
        <?php endif; ?>
    <?php endwhile;
        endif; 
            wp_reset_postdata();
    ?>			  
</div>