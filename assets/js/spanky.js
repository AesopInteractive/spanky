jQuery(document).ready(function(){

		// setup some js variables to use across the board
	var coverHeight 	= jQuery('.jorgen-article-cover').height(),
		windowHeight  	= jQuery(window).height(),
		entryContent 	= jQuery('.jorgen-entry-content'),
		storyHeader     = jQuery('.jorgen-story-header'),
		storylength 	= jQuery(entryContent).height(),
		gallery 		= jQuery('.aesop-stacked-gallery-wrap'),
		adminbar 		= jQuery('#wpadminbar').outerHeight(),
		body 			= jQuery('body');

	// In View Animations
	jQuery('.aesop-image-component, .aesop-audio-component').addClass('aesop-component-invisible');
	jQuery('.aesop-component-invisible').waypoint(function(direction) {
	   jQuery(this).toggleClass('aesop-component-visible');
	}, { offset: '80%' });

	// stacked gallery stuffs
	jQuery('.aesop-stacked-img').css({'height':(jQuery(window).height())+'px', 'width':(jQuery(window).width())+'px'});

});