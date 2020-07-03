<?php $i=0; $args = array('showposts' =>3, 'meta_query' => array(
        array(
            'key'   => 'feature',
            'value' => '1',
        )
    ));$loop = new WP_Query( $args );if ( $loop->have_posts() ) : while($loop->have_posts()): $loop->the_post();
?>

<div class="item">
    <a href="<?php the_permalink();?>"><img src="<?php echo get_the_post_thumbnail_url( $post->ID,'full' ); ?>" alt="<?php the_title();?>" class="img-fluid"></a>
    <div class="teaser">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h2><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
                </div>
            </div>
        </div>
    </div>
    <div class="shadow"></div>
</div>
<?php endwhile; endif; wp_reset_postdata();?>