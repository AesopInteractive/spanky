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

					$coverimg 		= wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID() ), 'spanky-index-cover' );
					?>

					<article class="spanky-indexpost-item">
						<div class="spanky-indexpost-item-inner">
							<?php the_title('<h2 class="spanky-indexpost-entry-title">','</h2>');?>
							<p class="spanky-indexpost-meta"><?php _e('Written by','spanky');?> <?php echo get_the_author();?></p>
							<div class="spanky-indexpost-item-excerpt"><?php echo wp_trim_words(get_the_excerpt(),22,'...');?></div>
							<a class="spanky-indexpost-readmore" href="<?php the_permalink();?>"><span>Read More</span>&nbsp;<i class="spankycon spankycon-angle-right"></i></a>
						</div>
						<div class="spanky-indexpost-item-img" style="background-image:url(<?php echo $coverimg[0];?>);background-repeat:no-repeat;background-size:cover;"></div>
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
