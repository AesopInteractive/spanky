jQuery(document).ready(function(){

		// setup some js variables to use across the board
	var windowHeight        = jQuery(window).height(),
		windowWidth			= jQuery(window).width(),
		body 				= jQuery('body'),
		chapterCover 		= jQuery('.aesop-article-chapter'),
		headerHeight		= jQuery('.andersen-header').height(),
		menuToggle			= jQuery('.andersen-menu-toggle');

	// In View Animations
	jQuery('.aesop-image-component, .aesop-audio-component').addClass('aesop-component-invisible');
	jQuery('.aesop-component-invisible').waypoint(function(direction) {
	   jQuery(this).toggleClass('aesop-component-visible');
	}, { offset: '80%' });

	// stacked gallery stuffs
	jQuery('.aesop-stacked-img').css({'height':(jQuery(window).height())+'px', 'width':(jQuery(window).width())+'px'});

	///////////////////
	//////////////////
	// article cover
	/////////////////
	/////////////////

	coverResizer = function(){
		jQuery(chapterCover).css({'height':(windowHeight - headerHeight)+'px'});
	}

	// set the cover to the size of the window
   	coverResizer()

   	// menu toggle
   	jQuery(menuToggle).click(function(e){
   		e.preventDefault()
   		jQuery(body).toggleClass('menu-open');

   	});
   	jQuery('main').click(function(){
   		jQuery(body).removeClass('menu-open');
   	});
});