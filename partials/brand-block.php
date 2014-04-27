<?php

$ispage = is_page() ? 'is-page' : false;?>

<div class="andersen-brand-block <?php echo $ispage;?>">

	<?php if ( get_theme_mod('andersen_site_logo') ) { ?>

		<a class="andersen-site-logo" href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><img src="<?php echo  get_theme_mod('andersen_site_logo');?>"></a>

	<?php } else { ?>

		<h1 class="andersen-site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

	<?php } ?>

</div>