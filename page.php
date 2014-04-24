<?php

	get_header();

	?><main class="clearfix"><?php

		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				?><div class="spanky-entry-content"><?php the_content();?></div><?php

			endwhile;

		else :

			get_template_part( 'content', 'none' );

		endif;

	?></main>

<?php get_footer(); ?>
