<?php

global $wp_query;

if(is_category()) {
	$category = $wp_query->query_vars['category_name'];
} elseif (is_tag()){
	$category = $wp_query->query['tag'];
} else {
	$category = '';
}
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$results = sprintf('<span class="spanky-search-results">%s</span>',$wp_query->found_posts);

?>

<div class="spanky-currently-viewing">
	<?php if (is_search()){ ?>

		<p class="spanky-search-results-summary"><?php _e('You searched for','spanky');?> <span class="spanky-searched-for"><?php echo the_search_query();?></span> <?php _e('and we found','spanky');?> <?php echo $results;?> <?php _e('results','spanky');?>.</p>

	<?php } elseif (is_author()) { ?>

		<p class="spanky-search-results-summary"><?php _e('Entries authored by','spanky');?> <span><?php echo  $curauth->nickname;?></span>.</p>

	<?php } else { ?>

		<?php _e('Archives for ','spanky');?> <span><?php echo $category;?></span>

	<?php } ?>

</div>