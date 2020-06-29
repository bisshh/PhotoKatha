<div class="rd-title mb-3">
    <h2><span>ताजा अपडेट</span></h2>
</div>
<div class="rd-wrap">
    <ul>
    <?php
        $args = array( 'numberposts' => 8, 'order'=> 'DESC' );
        $postslist = get_posts( $args );
        foreach ($postslist as $post) :  setup_postdata($post); ?> 
            <li>
                <a href="<?php the_permalink();?>"><?php the_title(); ?></a>
            </li>
    <?php endforeach; ?>
    </ul>
</div>