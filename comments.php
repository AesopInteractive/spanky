<?php

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
		die ('Please do not load this page directly. Thanks!');
	}

	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.','andersen');?></p>
	<?php
		return;
	}

	if (have_comments()) {
		$commentsClass = 'andersen-post-has-comments';
	} else {
		$commentsClass = null;
	}
?>

<!-- Comments -->
<?php do_action('andersen_before_comments');?>
<div id="andersen-comments-wrap" class="andersen-comments-wrap">
	
	<div id="andersen-comments" class="collapse <?php echo $commentsClass;?>">

		 <?php

		  if (have_comments()) {

			?><ol class="commentlist"><?php

		  		wp_list_comments();

		  	?></ol><?php

		  } else {

		  		_e('Be the first to leave a comment!', 'andersen');

		  }

		  ?>
		 <div class="navigation">
		  <?php paginate_comments_links(); ?>
		 </div>

		<?php comment_form(); ?>
	</div>
</div>
<?php do_action('andersen_after_comments');?>