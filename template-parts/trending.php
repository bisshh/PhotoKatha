<div class="owl-carousel owl-theme">
    <?php 
        $today = getdate();
        $popularpost = new WP_Query( 
            array( 
                'posts_per_page' => 8,
                'meta_key' => 'post_views_count', 
                'orderby' => 'meta_value_num', 
                'order' => 'DESC',
                'meta_query'=>array(
                    'key' => 'post_view_date', // Check the start date field
                    'value' => date("Y-m-d"), // Set today's date (note the similar format)
                    'compare' => '=', // Return the ones greater than today's date
                    'type' => 'DATE' // Let WordPress know we're working with date
                )
            ) 
        );
        while ( $popularpost->have_posts() ) : $popularpost->the_post(); ?>
        <div class="item">
            <div class="r-wrap">
                <div class="img-area">
                    <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-m-thumb' ); ?>" alt="" class="img-fluid rounded"></a>
                </div>
                <h4><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h4>
            </div>
        </div>	
    <?php
        endwhile;
    ?>    
</div>	
<script>
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        loop:true,
        margin:15,
        autoplay:true,
        autoplayTimeout:2000,
        autoplayHoverPause:true,
        responsive : {
            0 : {
                items:1
            },
            // breakpoint from 480 up
            480 : {
                items:2
            },
            // breakpoint from 768 up
            1280 : {
                items:5
            }
        }
    });
</script>	