<?php

global $wp_query;

if(is_category()) {
	$category = sprintf('for <span>%s</span>',$wp_query->query_vars['category_name']);
} elseif (is_tag()){
	$category = sprintf('for <span>%s</span>',$wp_query->query['tag']);
} else {
	$category = '';
}
$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

$results = sprintf('<span class="andersen-search-results">%s</span>',$wp_query->found_posts);

?>

<div class="andersen-currently-viewing">
	<?php if (is_search()){ ?>

		<p class="andersen-search-results-summary"><?php _e('You searched for','andersen');?> <span class="andersen-searched-for"><?php echo the_search_query();?></span> <?php _e('and we found','andersen');?> <?php echo $results;?> <?php _e('results','andersen');?>.</p>

	<?php } elseif (is_author()) { ?>

		<p class="andersen-search-results-summary"><?php _e('Entries authored by','andersen');?> <span><?php echo  $curauth->nickname;?></span>.</p>

	<?php } else { ?>

		<?php _e('Archives  ','andersen');?> <?php echo $category;?>

	<?php } ?>

</div>