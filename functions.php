<?php
/**
 * photokatha functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package photokatha
 */

include get_template_directory()."/inc/init.php";

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'photokatha_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function photokatha_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on photokatha, use a find and replace
		 * to change 'photokatha' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'photokatha', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Main Menu', 'photokatha' ),
				'menu-2' => esc_html__( 'Footer Menu', 'photokatha' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'photokatha_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'photokatha_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function photokatha_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'photokatha_content_width', 640 );
}
add_action( 'after_setup_theme', 'photokatha_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
function photokatha_scripts() {
	wp_enqueue_style( 'bootstrap-style', get_stylesheet_directory_uri().'/css/bootstrap.min.css' );
	wp_enqueue_style( 'owl-carousel-style', get_stylesheet_directory_uri().'/css/owl.carousel.min.css' );
	wp_enqueue_style( 'owl-theme-default-style', get_stylesheet_directory_uri().'/css/owl.theme.default.min.css' );
	wp_enqueue_style( 'photokatha-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'techie-style', get_stylesheet_directory_uri().'/css/photokatha.min.css' );
	wp_style_add_data( 'photokatha-style', 'rtl', 'replace' );

	wp_enqueue_script( 'photokatha-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'popper-js', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'moment-js', 'https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.1/moment.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'techie-js', get_template_directory_uri() . '/js/techie.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'photokatha-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'photokatha_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

// require get_template_directory(). "/inc/graphql/widget-type.php";

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Custom Image Crop
add_action( 'after_setup_theme', 'wpdocs_theme_setup' );
function wpdocs_theme_setup() {
	add_image_size( 'rd-m-thumb', 400, 225, true ); // 300 pixels wide (and unlimited height)
	add_image_size( 'rd-l-thumb', 750, 501, true );
	add_image_size( 'rd-thumb', 180, 180, true ); // profile Image
}

//Add Open Graph Meta Info
function insert_fb_in_head() {
	global $post;
	if ( !is_singular()) //if it is not a post or a page
		return;
        echo '<meta property="fb:admins" content="bisshh"/>';
		echo '<meta property="fb:app_id" content="406090473165349">';
        echo '<meta property="og:title" content="' . get_the_title() . '"/>';
        echo '<meta property="og:type" content="article"/>';
        echo '<meta property="og:description" content="' . get_the_excerpt() . '"/>';
        echo '<meta property="og:url" content="' . get_permalink() . '"/>';
        echo '<meta property="og:site_name" content="'. get_bloginfo('name') .'"/>';
	if(!has_post_thumbnail( $post->ID )) {
		$default_image= get_stylesheet_directory_uri()."/wp-content/uploads/2018/05/default-img.jpg";
		echo '<meta property="og:image" content="' . $default_image . '"/>';
	}
	else{
		$thumbnail_src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' );
		echo '<meta property="og:image" content="' . esc_attr( $thumbnail_src[0] ) . '"/>';
	}
	echo "";
}
add_action( 'wp_head', 'insert_fb_in_head', 5 );

//Registering Widgets
function techie_widgets_init() {
	$widgets = array(
		array('id' => 'skip-ad','name'=>'Skip Ads'),
		array('id' => 'footer-ad','name'=>'Footer Pop Up'),
		array('id' => 'top-ad','name'=>'माथिको विज्ञापन'),
		array('id' => 'after-breaking','name'=>'ब्रेकिङको तल'),		
		array('id' => 'after-hot-top-full','name'=>'हट न्युजको तल ठुलो'),
		array('id' => 'after-hot-news-small-left','name'=>'हट न्युजको तल सानो दायाँ' ),
		array('id' => 'after-hot-news-small-right','name'=>'हट न्युजको तल सानो बायाँ' ),
		array('id' => 'after-hot-bottom-full','name'=>'हट न्युजको तल ठुलो २'),
		array('id' => 'after-cover-top-full','name'=>'Cover Story को तल ठुलो'),
		array('id' => 'after-cover-small-left','name'=>'Cover Story को तल सानो दायाँ' ),
		array('id' => 'after-cover-small-right','name'=>'Cover Story को तल सानो बायाँ' ),
		array('id' => 'after-cover-bottom-full','name'=>'Cover Story को तल ठुलो २'),
		array('id' => 'after-glamour-top-full','name'=>'Glamour को तल ठुलो'),
		array('id' => 'after-glamour-small-left','name'=>'Glamour को तल सानो दायाँ' ),
		array('id' => 'after-glamour-small-right','name'=>'Glamour को तल सानो बायाँ' ),
		array('id' => 'after-glamour-bottom-full','name'=>'Glamour को तल ठुलो २'),
		array('id' => 'sidebar','name'=>'भित्रको पेजमा साइडबार' ),
		array('id' => 'detail-top','name'=>'भित्रको पेजमा सबै भन्दा माथी' ),
		array('id' => 'after-title','name'=>'भित्रको पेजमा हेडलाईन पछि' ),
		array('id' => 'after-feature-image','name'=>'भित्रको पेजमा फोटो पछि' ),
		array('id' => 'after-content','name'=>'भित्रको पेजमा न्युज पछि' ),
		array('id' => 'team','name'=>'टिम' ),
		array('id' => 'about','name'=>'हाम्रो बारे' ),
		array('id' => 'category','name'=>'फुटरको क्यटेगोरी' ),
	);
	foreach ($widgets as $widget) {
		register_sidebar( array(
			'name'          => esc_html__( $widget['name'], 'techie' ),
			'id'            => $widget['id'],
			'description'   => esc_html__( 'Add widgets here.', 'techie' ),
			'before_widget' => '<section class="widget">',
			'after_widget'  => '</section>',
			'before_title'  => '<span>',
			'after_title'   => '</span>',
		) );
	}

}
add_action( 'widgets_init', 'techie_widgets_init' );

//BREADCRUMBS
function the_breadcrumb()
{
    $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
    $delimiter = '&#8725;'; // delimiter between crumbs
    $home = 'गृहपृष्ठ'; // text for the 'Home' link
    $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb

    global $post;
    $homeLink = get_bloginfo('url');
    if (is_home() || is_front_page()) {
        if ($showOnHome == 1) {
            echo '<div id="crumbs" class="rd-breadcrumb"><a href="' . $homeLink . '">' . $home . '</a></div>';
        }
    } else {
        echo '<div id="crumbs" class="rd-breadcrumb"><a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
        if (is_category()) {
            $thisCat = get_category(get_query_var('cat'), false);
            if ($thisCat->parent != 0) {
                echo get_category_parents($thisCat->parent, true, ' ' . $delimiter . ' ');
            }
            echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
        } elseif (is_search()) {
            echo $before . 'Search results for "' . get_search_query() . '"' . $after;
        } elseif (is_day()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('d') . $after;
        } elseif (is_month()) {
            echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
            echo $before . get_the_time('F') . $after;
        } elseif (is_year()) {
            echo $before . get_the_time('Y') . $after;
        } elseif (is_single() && !is_attachment()) {
            if (get_post_type() != 'post') {
                $post_type = get_post_type_object(get_post_type());
                $slug = $post_type->rewrite;
                echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a>';
                if ($showCurrent == 1) {
                    echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
                }
            } else {
                $cat = get_the_category();
                $cat = $cat[0];
                $cats = get_category_parents($cat, true, ' ' . $delimiter . ' ');
                if ($showCurrent == 0) {
                    $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
                }
                echo $cats;
                if ($showCurrent == 1) {
                    echo $before . get_the_title() . $after;
                }
            }
        } elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
            $post_type = get_post_type_object(get_post_type());
            echo $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
            $parent = get_post($post->post_parent);
            $cat = get_the_category($parent->ID);
            $cat = $cat[0];
            echo get_category_parents($cat, true, ' ' . $delimiter . ' ');
            echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a>';
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_page() && !$post->post_parent) {
            if ($showCurrent == 1) {
                echo $before . get_the_title() . $after;
            }
        } elseif (is_page() && $post->post_parent) {
            $parent_id  = $post->post_parent;
            $breadcrumbs = array();
            while ($parent_id) {
                $page = get_page($parent_id);
                $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
                $parent_id  = $page->post_parent;
            }
            $breadcrumbs = array_reverse($breadcrumbs);
            for ($i = 0; $i < count($breadcrumbs); $i++) {
                echo $breadcrumbs[$i];
                if ($i != count($breadcrumbs)-1) {
                    echo ' ' . $delimiter . ' ';
                }
            }
            if ($showCurrent == 1) {
                echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
            }
        } elseif (is_tag()) {
            echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        } elseif (is_author()) {
            global $author;
            $userdata = get_userdata($author);
            echo $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif (is_404()) {
            echo $before . 'Error 404' . $after;
        }
        if (get_query_var('paged')) {
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ' (';
            }
            echo __('Page') . ' ' . get_query_var('paged');
            if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author()) {
                echo ')';
            }
        }
        echo '</div>';
    }
}

// Original User Detail
add_action("save_post",function($post_id,$post,$update){
	$slug="post";
	if($slug!==$post->post_type)
		return $post_id;
	if($update)
		return $post_id;
	update_post_meta($post_id,"techie_original_author",get_current_user_id());
	update_post_meta($post_id,"techie_original_post_date",current_time('Y-m-d H:i:s'));
},10,3);

add_action("save_post",function($post_id,$post,$update){
	$slug="post";
	if($slug!==$post->post_type)
		return $post_id;
	if ($post->post_status==="publish"&&get_post_meta($post_id,"techie_first_publisher", true)===""){
			update_post_meta($post_id,"techie_first_publisher",get_current_user_id());
			update_post_meta($post_id,"techie_first_post_date",current_time('Y-m-d H:i:s'));
	}
	else if($post->post_status==="publish"){
		update_post_meta($post_id,"techie_last_publisher",get_current_user_id());
		update_post_meta($post_id,"techie_last_post_date",current_time('Y-m-d H:i:s'));
	}
	// update_post_meta($post_id,"techie_original_author",get_current_user_id());
},20,3);

function techie_admin_original_author_detail(){
	$original_author=get_post_meta(get_the_ID(),"techie_original_author", true);
	$first_publisher=get_post_meta(get_the_ID(),"techie_first_publisher", true);
	$last_publisher=get_post_meta(get_the_ID(),"techie_last_publisher", true);
	$name=get_author_name(absint($original_author));
	$first_publisher_name=get_author_name(absint($first_publisher));
	$last_publisher_name=get_author_name(absint($last_publisher));
	$original_date=get_post_meta(get_the_ID(),"techie_original_post_date", true);
	$first_date=get_post_meta(get_the_ID(),"techie_first_post_date", true);
	$last_date=get_post_meta(get_the_ID(),"techie_last_post_date", true);

	echo "<div>";
	echo "Original Author Name: " . $name ."\n";
	echo "Original Date: " . $original_date;
	echo "</div>";
	echo "<div>";
	echo "First Publisher Name: " . $first_publisher_name ."\n";
	echo "First Date: " . $first_date;
	echo "</div>";
	echo "<div>";
	echo "Last Publisher Name: " . $last_publisher_name ."\n";
	echo "Last Date: " . $last_date;
	echo "</div>";
}


function add_custom_meta_box()
{
	if(current_user_can('administrator')){
		add_meta_box("techie-original-author", "Original Author Detail", "techie_admin_original_author_detail", "post", "side", "high", null);
	}
}

add_action("add_meta_boxes", "add_custom_meta_box");

//Post View Action
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}
function setPostViews($postID) {
	$count_key = 'post_views_count';
	$today = getdate();
	$query = new WP_Query( 'year=' . $today['year'] . '&monthnum=' . $today['mon'] . '&day=' . $today['mday'] );

    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
		add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
		update_post_meta($postID, $count_key, $count);
    }
}

function setDateView($postID){
	$dateKey='post_view_date';
	$todayDate=new DateTime("now");
	$todayDate->setTime(0,0,0);
	$currentPostViewDate=get_post_meta($postID,$dateKey,true);
	$currentPostViewDate=new DateTime($currentPostViewDate);
	if($currentPostViewDate){
		//find the difference between two dates
		if($currentPostViewDate!=$todayDate){
			update_post_meta($postID, $dateKey,$todayDate->format("Y-m-d"));
		}
	}
	else{
		add_post_meta($postID, $dateKey,$todayDate->format("Y-m-d"));
	}

}

// Add View Column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
    if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}

//Category for Detail Page
function categories(){
    $categories = get_the_category();
    $category_names = array();
    foreach ($categories as $category)
    {
        $category_names[] = $category->cat_name;
    }
    echo implode(', ', $category_names);
}

// Description
function my_custom_excerpt ( $content, $limit = 20, $more = '...' ){                      
    return $data = wp_trim_words( strip_tags( $content ), $limit, $more );
}

//Custom Logo and homepage url for Login Page
function wpb_login_logo() { ?>
    <style type="text/css">
        #login h1 a, .login h1 a {
            background-image: url(<?php echo get_template_directory_uri(); ?>/img/logo.png);
        height: 100px;
    	width: 320px;
        background-size: contain;
		background-repeat: no-repeat;
        padding: 10px 0;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'wpb_login_logo' );

function wpb_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'wpb_login_logo_url' );
 
function wpb_login_logo_url_title() {
    return 'Your Site Name and Info';
}
add_filter( 'login_headertitle', 'wpb_login_logo_url_title' );

//Paging Require
require get_template_directory().'/template-parts/loop/paging.php';

//Custom Search
function wpdocs_my_search_form( $form ) {
    $form = '<form role="search" method="get" id="searchform" class="searchform" action="' . home_url( '/' ) . '" >
    <div class="input-group">
    <input type="text" value="' . get_search_query() . '" name="s" id="s" class="form-control" placeholder="समाचार खोज्नुहोस.." />
	<div class="input-group-append">
		<button class="btn btn-default" type="submit" id="searchsubmit"><i class="fad fa-search"></i></div>
	</div>
    </div>
    </form>';
 
    return $form;
}
add_filter( 'get_search_form', 'wpdocs_my_search_form' );

add_action("wp_footer",function(){?>
<script>
	   WebFontConfig = {
			 google: {
				 families: ['Mukta:400,700']
			 }
	   };

	   (function(d) {
	      var wf = d.createElement('script'), s = d.scripts[0];
	      wf.src = 'https://ajax.googleapis.com/ajax/libs/webfont/1.6.26/webfont.js';
	      wf.async = true;
	      s.parentNode.insertBefore(wf, s);
	   })(document);
	</script>

<?php
});

add_action("wp",function(){
		if(is_front_page()){
			add_filter( 'wpcf7_load_js', '__return_false' );
			add_filter( 'wpcf7_load_css', '__return_false' );
		}
});

// wp_dequeue_style( 'wp-block-library' );
// wp_dequeue_style( 'wp-block-library-theme' );

add_action( 'wp_enqueue_scripts', 'eikra_child_styles', 18 );
function eikra_child_styles() {
	
	//remove gutenberg
	wp_dequeue_style( 'wp-block-library' );
 	wp_dequeue_style( 'wp-block-library-theme' );
}
