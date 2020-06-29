<?php get_template_part('homepage/header');?> <!-- /Hot -->
	<main class="main-contain">
		<div class="container">
			<?php
				setPostViews(get_the_ID());
				setDateView(get_the_ID());
			?>	

			<?php
				while ( have_posts() ) :
					the_post();

					get_template_part( 'template-parts/content', get_post_type() );
				endwhile; // End of the loop.
			?>
		</div>
	</main>

<?php
get_footer();
