
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

	</body>

</html>
