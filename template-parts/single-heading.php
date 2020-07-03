<?php if ( is_active_sidebar( 'detail-top' ) ) : ?>
    <div class="col-12">
        <div class="rd-ads">
            <?php dynamic_sidebar('detail-top');?>
        </div>
    </div>
<?php endif; ?>

<div class="row post-meta d-flex align-items-center">
    <div class="col-lg-12">
        <div class="row">
            <div class="col-md-12">
                <div class="post-info d-flex align-items-center">
                    <?php
                    $image = get_field('author_photo');
                    if( !empty( $image ) ):
                        ?>
                        <img src="<?php echo esc_url($image['url']); ?>" class="img-fluid rounded-circle" alt="<?php echo esc_attr($image['alt']); ?>" width="60" height="60" />
                    <?php else : ?>
                        <?php echo get_avatar( get_the_author_meta( 'ID' ), 60  ); ?>
                    <?php endif; ?>                      
                    <span class="rduser border-right">
                        <?php if( get_field('author_name') ): ?>
                            <span itemprop="author"><?php the_field('author_name'); ?></span>
                        <?php else : ?>
                            <span itemprop="author"><?php the_author_posts_link(); ?></span>
                        <?php endif; ?>
                        <span class="author-info">
                            <?php if( get_field('author_info') ): ?>
                                <?php the_field('author_info'); ?>
                            <?php else: ?>
                                <?php echo my_custom_excerpt( get_the_author_meta('description') ); ?>
                            <?php endif; ?>
                        </span>
                    </span>
                    <span class="rddate" itemprop="datePublished"><i class="fal fa-clock"></i> <?php echo the_date(); ?> गते <?php echo the_time(); ?> मा प्रकाशित</span>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="rd-heading">
    <?php
    if ( is_singular() ) :
        the_title( '<h1 itemprop="name">', '</h1>' );
    else :
        the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
    endif;
    ?>

    <?php if( get_field('sub_heading') ): ?>
        <h2><?php the_field('sub_heading'); ?></h2>
    <?php else : ?>
    <?php endif; ?>
</div>
<hr>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_inline_share_toolbox"></div>
<hr>
<?php if ( is_active_sidebar( 'after-title' ) ) : ?>
    <div class="col-12">
        <div class="rd-ads">
            <?php dynamic_sidebar('after-title');?>
        </div>
    </div>
<?php endif; ?>
