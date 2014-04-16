<?php

$author_id = get_the_author_meta('ID');
$author_name = get_the_author_meta('display_name');
$author_img = get_avatar($author_id,50,'', $author_name); 

?>

<div class="spanky-meta-block">
	<?php echo the_title('<h2 class="spanky-entry-title">','</h2>');?>
	<div class="spanky-meta-block-author">
		<?php echo $author_img;?>
		<span class="spanky-posted-by">posted by</span>
		<span class="spanky-author-name"><?php echo $author_name;?></span>
	</div>
</div>