<?php

/*
 Template Name: All Stories
*/

get_header();

?><main class="clearfix">

	<?php get_template_part('content','sidebar');?>

	<!-- Story Loop -->
	<div class="spanky-content-right spanky-front-listing">
		<?php
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

					$coverimg 		= wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID() ), 'spanky-tiny-cover' );
					?>

					<article class="spanky-indexpost-item">
						<a class="spanky-fader spanky-indexpost-item-link" href="<?php the_permalink();?>">
							<div class="spanky-indexpost-item-inner">
								<h2 class="spanky-indexpost-entry-title"><?php the_title();?></h2>
								<p class="spanky-indexpost-meta">Written by <?php echo get_the_author();?></p>
								<div class="spanky-indexpost-item-excerpt"><?php echo wp_trim_words(get_the_excerpt(),22,'...');?></div>
							</div>
							<div class="spanky-indexpost-item-img" style="background-image:url(<?php echo $coverimg[0];?>);background-repeat:no-repeat;background-size:cover;"></div>
						</a>
					</article>

					<?php

				endwhile;

			else :

				get_template_part( 'content', 'none' );

			endif;
			?>
	</div>
</main>

<?php get_footer(); ?>
