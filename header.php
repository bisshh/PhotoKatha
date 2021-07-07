<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package photokatha
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.js"></script>
	<script type="text/javascript" src="<?php echo get_stylesheet_directory_uri();?>/js/owl.carousel.min.js"></script>
	<?php wp_head(); ?>
	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-WXLBTC2');</script>
	<!-- End Google Tag Manager -->

	<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.js"></script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/respond.min.js"></script>
	<![endif]-->
	<!-- Go to www.addthis.com/dashboard to customize your tools -->
	<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5dfeb57ad8e136ac"></script>
</head>

<body <?php body_class(); ?>>
<a href="https://www.techie.com.np" style="display:none;">Techie IT</a>    
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WXLBTC2"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=2358789964361367&autoLogAppEvents=1"></script>
<?php wp_body_open(); ?>
<?php if ( is_active_sidebar( 'top-ad' ) ) : ?>	
<div class="col-md-12">
	<div class="rd-ads">
		<?php dynamic_sidebar('top-ad');?>
	</div>
</div>
<?php endif;?>
<div class="banner">
	<header>
		<div class="container">
			<div class="row g-0">
				<div class="col-md-1 col-2">
					<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><img src="<?php echo get_stylesheet_directory_uri();?>/img/logo-1.png" alt="PhotoKatha logo" class="img-fluid"></a>
				</div>
				<div class="col-md-10 col-10">
					<?php wp_nav_menu( array('theme_location' => 'menu-1') ); ?>
				</div>
			</div>
		</div>
	</header>
	<div class="owl-carousel owl-theme">
		<?php get_template_part('homepage/breaking');?> <!-- /Breaking -->
	</div>
	<script>
		$('.owl-carousel').owlCarousel({
		loop:true,
		nav:true,
		autoplay:true,
		autoplayTimeout:5000,
		autoplayHoverPause:false,
		responsive:{
			0:{
				items:1
			}
		}
	})
	</script>	
</div>

<?php if ( is_active_sidebar( 'after-menu' ) ) : ?>	
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="rd-ads">
				<?php dynamic_sidebar('after-menu');?>
			</div>
		</div>
	</div>
</div>
<?php endif;?>