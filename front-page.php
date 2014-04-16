<?php

/*
 Template Name: All Stories
*/

get_header();

get_template_part('content','sidebar');?>

<!-- Story Loop -->
<div class="spanky-content-right">
	<?php
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				the_title();

			endwhile;

		else :

			get_template_part( 'content', 'none' );

		endif;
		?>
</div>

<?php get_footer(); ?>
