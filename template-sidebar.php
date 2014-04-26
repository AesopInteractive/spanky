<?php

/*
*	Template Name: Page with Sidebar
*/
get_header();

?><main class="clearfix">

	<?php get_template_part('content','sidebar');?>

	<!-- Story Loop -->
	<div class="andersen-content-right">

		<?php

			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

					?><div class="andersen-entry-content"><?php the_content();?></div><?php

				endwhile;

			else :

				get_template_part( 'content', 'none' );

			endif;
			?>
	</div>
</main>

<?php get_footer(); ?>
