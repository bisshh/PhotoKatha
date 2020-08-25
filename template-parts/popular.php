<div class="rd-title">
    <p><span>Top</span> Posts</p>
</div>
<div class="rd-wrap">
    
        <?php 
            $week = date( 'W' );
            $year = date( 'Y' );
            $popularpost = new WP_Query( 
                array( 'posts_per_page' => 8,
                'date_query' => array(
                    array(
                        'year' => $year,
                        '&w' => $week,
                    ),
                ),    
                'meta_key' => 'post_views_count', 
                'orderby' => 'meta_value_num', 
                'order' => 'DESC'  ) 
            );
            $i = 1;
            while ( $popularpost->have_posts() ) : $popularpost->the_post();
            ?>
                <div class="row d-flex align-items-center mb-3 pb-3 border-bottom">
                    <div class="col-10"><a href="<?php the_permalink();?>"><?php the_title(); ?></a></div>
                    <div class="col-2 pr-0">
                        <span><?php echo $i++ ?></span>                
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata();
        ?>
    
</div>