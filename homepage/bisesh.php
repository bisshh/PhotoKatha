<div class="col-md-3 bishes-bg">
    <h2 class="d-flex align-items-center justify-content-center"><a href="#">विशेष<br>
    रिपोर्ट</a></h2>
</div>
<div class="col-md-9">
    <div class="owl-carousel owl-theme">
        <?php $i=0; $args = array('showposts' =>5, 'cat' => '5');$loop = new WP_Query( $args );if ( $loop->have_posts() ) : while($loop->have_posts()): $loop->the_post();?>
        <div class="item">
            <div class="rd-item">
                <div class="image">
                    <figure><a href="<?php the_permalink();?>"><img class="img-fluid" src="<?php echo get_the_post_thumbnail_url( $post->ID,'rd-m-thumb' ); ?>" alt="<?php the_title();?>"></a></figure>
                </div>
                <div class="teaser">
                    <h4><a href="<?php the_permalink();?>"><?php the_title();?></a></h4>
                    <?php if( get_field('author_name') ): ?>
                        <span class="author"><i class="fad fa-user-circle"></i> <?php the_field('author_name'); ?></span>
                        <?php else : ?>	
                        <span class="author"><i class="fad fa-user-circle"></i> <?php the_author_posts_link(); ?></span>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php endwhile; endif; wp_reset_postdata();?>
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
                768 : {
                    items:3
                },
                // breakpoint from 768 up
                1280 : {
                    items:4
                }
            }
        });
    </script>
</div>