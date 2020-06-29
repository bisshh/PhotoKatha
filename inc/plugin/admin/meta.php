<?php
add_action( 'add_meta_boxes', 'techie_add_custom_box' );
add_action( 'save_post', 'techie_save_postdata',100,1);

function techie_add_custom_box()
{
    add_meta_box(
        'techie_section_image',
        __( 'Featured Image Settings', 'techie_textdomain' ),
        'techie_inner_custom_box',
        'post',
        'side'
    );
}

function techie_inner_custom_box($post){
    wp_nonce_field( basename( __FILE__ ), 'techie_noncename' );

    $value = get_post_meta($post->ID, 'techie_field',true) ? get_post_meta($post->ID, 'techie_field',true) : 0;
    ob_start();
?>
    <label for="techie_field">
        <?php _e("Hide Featured Image", 'myplugin_textdomain' ); ?>
    </label>
    <input type='checkbox' id='techie_field' name='techie_field' value='1' <?php checked($value, 1 ); ?>  />
<?php
    $content=ob_get_contents();
    ob_end_clean();
    echo $content;
}


function techie_save_postdata( $post_id ){

    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
        return;
    if(!isset($_POST['techie_noncename'])){
        return;
    }
    if ( !wp_verify_nonce( $_POST['techie_noncename'], basename( __FILE__ ) ) )
        return;

    if ( 'post' == $_POST['post_type'] )
    {
        if ( !current_user_can( 'edit_page', $post_id ) )
            return;
    }
    else
    {
        if ( !current_user_can( 'edit_post', $post_id ) )
            return;
    }

    $techie_data = !is_null($_POST['techie_field'])?$_POST['techie_field']:0;

    update_post_meta($post_id, 'techie_field', $techie_data);
}