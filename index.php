<?php
get_header();

$getreadmore = sprintf('..&nbsp;&nbsp;<a class="spanky-indexpost-readmore" href="<?php the_permalink();?>"><span>%s</span></a>', __('[read more]','spanky'));
$readmore = apply_filters('spanky_read_more', $getreadmore);

?><main class="clearfix">

	<?php get_template_part('content','sidebar');?>

	<!-- Story Loop -->
	<div class="spanky-content-right spanky-front-listing">
		<div class="spanky-index-listing">
		<?php
			if ( have_posts() ) :

				while ( have_posts() ) : the_post();

					if(is_single()){

						get_template_part('content','single');

					} else {
						?>

						<article class="spanky-indexpost-item">

							<?php echo the_post_thumbnail('spanky-index-cover', array('class' => 'spanky-indexpost-img spanky-img'));?>

							<div class="spanky-indexpost-item-inner">
								<p class="spanky-indexpost-meta"><?php apply_filters('spanky_meta_text', _e('Written by','spanky')); ?> <?php echo get_the_author();?></p>
								<h2 class="spanky-indexpost-entry-title"><a href="<?php the_permalink();?>"><?php the_title();?></a></h2>
								<div class="spanky-indexpost-item-excerpt"><?php echo wp_trim_words(get_the_excerpt(),32,$readmore);?></div>
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
