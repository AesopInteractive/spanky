<div class="spanky-brand-block">

	<?php if (get_theme_mod('spanky_site_logo')) { ?>

		<a class="spanky-site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo  get_theme_mod('spanky_site_logo');?>"></a>

	<?php } else { ?>
		<h1 class="spanky-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
	<?php } ?>

</div>