<?php do_action('ase_theme_sb_before'); //action ?>

<!-- Aside -->
<aside class="spanky-content-left">

	<?php do_action('ase_theme_sb_inside_top'); //action

	get_template_part('partials/brand-block');

	if( is_home() || is_archive() ){
		do_action('ase_addon_social_links'); //action
	}

	if( is_single() ){
		get_template_part('partials/meta-block');
	}

	if ( is_singular() ){

		if(has_shortcode($post->post_content,'aesop_chapter')){ ?>
			<div class="aesop-entry-header">
				<h6 class="spanky-sb-heading">Chapter</h6>
			</div>
		<?php }

		if (has_shortcode($post->post_content,'aesop_timeline_stop')){ ?>
			<h6 class="spanky-sb-heading">Timeline</h6>
			<?php do_action('aesop_inside_body_top');
		}

		if( is_active_sidebar('spanky_single_sb') ) { ?>
			<div class="spanky-sb">
				<?php dynamic_sidebar('spanky_single_sb'); ?>
			</div>
		<?php }


	}

	if( is_home() || is_archive() && is_active_sidebar('spanky_sb') ) { ?>
	<div class="spanky-sb">
		<?php dynamic_sidebar('spanky_sb'); ?>
	</div>
	<?php } ?>

	<?php do_action('ase_theme_sb_inside_bottom'); //action ?>

</aside>


<?php do_action('ase_theme_sb_after'); //action ?>