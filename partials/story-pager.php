<!-- More Stories -->
<div class="spanky-story-pager">
	<div class="spanky-width">
		<?php

		$prev = get_adjacent_post(true,'',true); 
		$prevlink = get_permalink(get_adjacent_post(false,'',true));

		$next = get_adjacent_post(false,'',false);
		$nextlink = get_permalink(get_adjacent_post(false,'',false));

		if ($prevlink != get_permalink()) {
			?><a class="spanky-post-adjacent previous" href="<?php echo $prevlink;?>">
				<?php echo get_the_post_thumbnail($prev->ID, array(60,60, true) ); ?>
				<p><?php apply_filters('spanky_previous_text',_e('Previous Story','spanky'));?></p>
				<h6 class="spanky-post-adjacent-title"><?php echo $prev->post_title; ?></h6>
			</a>
		<?php }

		if ($nextlink != get_permalink()) {
			?><a class="spanky-post-adjacent next" href="<?php echo $nextlink;?>">
				<?php echo get_the_post_thumbnail($next->ID, array(60,60, true) ); ?>
				<p><?php apply_filters('spanky_next_text',_e('Next Story','spanky'));?></p>
				<h6 class="spanky-post-adjacent-title"><?php echo $next->post_title; ?></h6>
			</a>
		<?php } ?>
	</div>
</div>