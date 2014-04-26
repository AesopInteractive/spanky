<?php
get_header();

?><main class="clearfix">

	<?php get_template_part('content','sidebar');?>

	<!-- Story Loop -->
	<div class="andersen-content-right andersen-front-listing">


		<?php if (is_archive()){
			get_template_part('partials/currently-viewing');
		}?>

		<div class="andersen-index-listing">
		<?php
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

					if(is_single()){

						get_template_part('content','single');

					} else {
						?>

						<article class="andersen-indexpost-item">

							<?php echo the_post_thumbnail('andersen-index-cover', array('class' => 'andersen-indexpost-img andersen-img'));?>

							<div class="andersen-indexpost-item-inner">
								<p class="andersen-indexpost-meta"><?php apply_filters('andersen_meta_text', _e('Written by','andersen')); ?> <span><?php echo get_the_author();?></span></p>
								<h2 class="andersen-indexpost-entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								<div class="andersen-indexpost-item-excerpt"><?php echo get_the_excerpt();?></div>
								<a class="andersen-indexpost-readmore" href="<?php the_permalink();?>"><span><?php echo apply_filters('andersen_read_more', _e('Read more...','andersen'));?></span></a>
							</div>

						</article>

						<?php
					}

				endwhile;

			else :

				get_template_part( 'content', 'none' );

			endif;
			?>
		</div>
	</div>
</main>

<?php get_footer(); ?>
