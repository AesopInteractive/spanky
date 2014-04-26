<?php

$author_id = get_the_author_meta('ID');
$author_name = get_the_author_meta('display_name');
$author_img = get_avatar($author_id,50,'', $author_name); 

?>

<div class="andersen-meta-block">
	<?php echo the_title('<h2 class="andersen-entry-title">','</h2>');?>
	<div class="andersen-meta-block-author">
		<?php echo $author_img;?>
		<span class="andersen-posted-by">posted by</span>
		<span class="andersen-author-name"><?php echo $author_name;?></span>
	</div>
</div>