jQuery(document).ready(function($) {

	// The number of the next page to load (/page/x/).
	var pageNum = parseInt(pbd_alp.startPage) + 1;

	// The maximum number of pages the current query can return.
	var max = parseInt(pbd_alp.maxPages);

	// The link of the next page of posts.
	var nextLink = pbd_alp.nextLink;

	/**
	 * Replace the traditional navigation with our own,
	 * but only if there is at least one page of new posts to load.
	 */
	if(pageNum <= max) {
		// Insert the "More Posts" link.
		$('.andersen-front-listing')
			.append('<div class="andersen-index-listing clearfix andersen-index-listing-'+ pageNum +'"></div>')
			.append('<p class="andersen-load-more-posts fix"><a class="btn btn-warning" href="#">Load More Stories</a></p>');

	}


	/**
	 * Load new posts when the link is clicked.
	 */
	$('.andersen-load-more-posts a').click(function() {


		// Are there more posts to load?
		if(pageNum <= max) {

			// Show that we're working.
			$(this).text('Loading stories...');

			$('.andersen-index-listing-'+ pageNum).load(nextLink + ' .andersen-indexpost-item',
				function() {
					// Update page number and nextLink.
					pageNum++;
					nextLink = nextLink.replace(/\/page\/[0-9]?/, '/page/'+ pageNum);

					// Add a new placeholder, for when user clicks again.
					$('.andersen-load-more-posts')
						.before('<div class="andersen-index-listing clearfix andersen-index-listing-'+ pageNum +'"></div>')

					// Update the button message.
					if(pageNum <= max) {
						$('.andersen-load-more-posts a').text('Load More Stories');
					} else {
						$('.andersen-load-more-posts a').text('No more stories to load');
					}

				}
			);
		} else {
			$('.andersen-load-more-posts a').append('.');
		}

		return false;
	});

});