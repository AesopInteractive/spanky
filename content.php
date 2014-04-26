<?php

global $post;

get_template_part('content','sidebar');

do_action('ase_theme_post_before'); //action ?>

<!-- Story Entry -->
<article id="post-<?php the_ID(); ?>" <?php post_class('andersen-content-right andersen-entry-content aesop-entry-content clearfix'); ?>>
	
	<?php do_action('ase_theme_post_inside_topÏ'); //action ?>

	<?php the_content(); ?>

	<?php wp_link_pages( array(
		'before'      => '<div class="andersen-page-links"><span class="andersen-page-links-title">' . __( 'Pages:', 'andersen' ) . '</span>',
		'after'       => '</div>',
		'link_before' => '<span>',
		'link_after'  => '</span>',
	) ); ?>

	<?php if (is_single()){ ?>

	<div class="andersen-post-meta">
		<div class="andersen-cat-links"><?php echo get_the_category_list( _x( '<span>&middot;</span> ', '', 'andersen' ) ); ?></div>
		<?php echo get_the_tag_list('<div class="andersen-tag-links">','<span>&middot;</span> ','</div>'); ?>
		<a class="andersen-comments-toggle" href="#" onclick="return false;" data-target="#andersen-comments" data-toggle="collapse"><i class="andersencon andersencon-comments"></i>&nbsp;<?php comments_number( ' ', '<span>1</span>', '<span>%</span>' ); ?></a>
	</div>
	<?php } ?>

		<?php
		// If comments are open or we have at least one comment, load up the comment template.

		if ( comments_open() || get_comments_number() ) {

			comments_template();
		}

	get_template_part('partials/story-pager');
	?>

	<?php do_action('ase_theme_post_inside_bottom'); //action ?>

</article>
<?php do_action('ase_theme_post_after'); //action ?>