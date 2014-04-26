<?php

global $post;

get_template_part('content','sidebar');?>

<!-- Story Entry -->
<article id="post-<?php the_ID(); ?>" <?php post_class('spanky-content-right spanky-entry-content aesop-entry-content clearfix'); ?>>
	<?php the_content(); ?>

	<?php wp_link_pages( array(
		'before'      => '<div class="spanky-page-links"><span class="spanky-page-links-title">' . __( 'Pages:', 'spanky' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) ); ?>

	<?php if (is_single()){ ?>

	<div class="spanky-post-meta">
		<div class="spanky-cat-links"><?php echo get_the_category_list( _x( '<span>&middot;</span> ', '', 'spanky' ) ); ?></div>
		<?php echo get_the_tag_list('<div class="spanky-tag-links">','<span>&middot;</span> ','</div>'); ?>
		<a class="spanky-comments-toggle" href="#" onclick="return false;" data-target="#spanky-comments" data-toggle="collapse"><i class="spankycon spankycon-comments"></i>&nbsp;<?php comments_number( ' ', '<span>1</span>', '<span>%</span>' ); ?></a>
	</div>
	<?php } ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.

		if ( comments_open() || get_comments_number() ) {

			comments_template();
		}

	get_template_part('partials/story-pager');
	?>

</article>