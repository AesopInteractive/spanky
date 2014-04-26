
	<footer class="spanky-footer">
		<p class="spanky-footer-text">
			<?php 

			$footertext = get_theme_mod('spanky_footer_text');

			if ($footertext) {
				echo $footertext;
			}
			?>
		</p>
		<div>
			<?php wp_footer(); ?>
		</div>
	</footer>

	<?php do_action('ase_theme_body_inside_borrom'); //action ?>

	</body>

	<?php do_action('ase_theme_body_after'); //action ?>

</html>
