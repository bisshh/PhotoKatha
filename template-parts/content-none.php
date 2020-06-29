<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package healthaawaj
 */

?>

<section class="no-results not-found">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h1><?php esc_html_e( 'Nothing Found', 'healthaawaj' ); ?></h1>

				<div class="page-content">
					<?php
					if ( is_home() && current_user_can( 'publish_posts' ) ) :

						printf(
							'<p>' . wp_kses(
								/* translators: 1: link to WP admin new post page. */
								__( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'healthaawaj' ),
								array(
									'a' => array(
										'href' => array(),
									),
								)
							) . '</p>',
							esc_url( admin_url( 'post-new.php' ) )
						);

					elseif ( is_search() ) :
						?>

						<p><?php esc_html_e( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'healthaawaj' ); ?></p>
						<?php
						get_search_form();

					else :
						?>

						<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'healthaawaj' ); ?></p>
						<?php
						get_search_form();

					endif;
					?>
				</div><!-- .page-content -->
			</div>
		</div>
	</div>
</section><!-- .no-results -->
