<?php do_action('ase_sb_before'); //action ?>

<!-- Aside -->
<aside class="spanky-content-left">

	<?php do_action('ase_sb_inside_top'); //action ?>

	<div class="spanky-brand-block">

		<a class="spanky-site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="http://placekitten.com/140/60"></a>

	</div>
	<?php if(is_single()){
		get_template_part('partials/meta-block');
	}


	if (is_singular()){

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

	if( is_home() && is_active_sidebar('spanky_sb') ) { ?>
	<div class="spanky-sb">
		<?php dynamic_sidebar('spanky_sb'); ?>
	</div>
	<?php } ?>

	<?php do_action('ase_sb_inside_bottom'); //action ?>

</aside>


<?php do_action('ase_sb_after'); //action ?>