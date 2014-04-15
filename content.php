<aside class="spanky-content-left">
	<div class="spanky-author-block">
		
	</div>
</aside>
<!-- Story Entry -->
<article id="post-<?php the_ID(); ?>" <?php post_class('spanky-content-right spanky-entry-content aesop-entry-content clearfix'); ?>>
	<?php the_content(); ?>

	<?php wp_link_pages( array(
		'before'      => '<div class="spanky-page-links"><span class="spanky-page-links-title">' . __( 'Pages:', 'spanky' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) ); ?>

	<footer class="spanky-post-meta">
		<div class="spanky-cat-links"><?php echo get_the_category_list( _x( '<span>&middot;</span> ', '', 'spanky' ) ); ?></div>
		<?php echo get_the_tag_list('<div class="spanky-tag-links">','<span>&middot;</span> ','</div>'); ?>
	</footer>
</article>