<?php do_action('ase_theme_sb_before'); //action ?>

<!-- Aside -->
<aside class="andersen-content-left">
	<div class="andersen-content-left-inner">

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
					<h6 class="andersen-sb-heading">Chapter</h6>
				</div>
			<?php }

			if (has_shortcode($post->post_content,'aesop_timeline_stop')){ ?>
				<h6 class="andersen-sb-heading">Timeline</h6>
				<?php do_action('aesop_inside_body_top');
			}

			if( is_active_sidebar('andersen_single_sb') ) { ?>
				<div class="andersen-sb">
					<?php dynamic_sidebar('andersen_single_sb'); ?>
				</div>
			<?php }


		}

		if( is_home() || is_archive() && is_active_sidebar('andersen_sb') ) { ?>
		<div class="andersen-sb">
			<?php dynamic_sidebar('andersen_sb'); ?>
		</div>
		<?php } ?>

		<?php do_action('ase_theme_sb_inside_bottom'); //action ?>

	</div>
	<a class="andersen-sb-toggle" href="#"><span>• • •</span></a>
</aside>


<?php do_action('ase_theme_sb_after'); //action ?>