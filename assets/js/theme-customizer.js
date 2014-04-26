/**
 * This file adds some LIVE to the Theme Customizer live preview. To leverage
 * this, set your custom settings to 'postMessage' and then add your handling
 * here. Your javascript should grab settings from customizer controls, and
 * then make any necessary changes to the page using jQuery.
 */
(function($){

	// Update the site title in real time...
	wp.customize( 'blogname', function( value ) {
	    value.bind( function( newval ) {
	        $('.andersen-site-title a').html( newval );
	    });
	});

	//Update site background color...
	wp.customize( 'andersen_background_color', function( value ) {
	    value.bind( function( newval ) {
	        $('body,.aesop-parallax-sc-caption-wrap').css('background-color', newval );
	        $('.andersen-post-meta .andersen-cat-links span, .andersen-post-meta .andersen-tag-links span').css('color', newval );
	    });
	});

	//Update site text color
	wp.customize( 'andersen_text_color', function( value ) {
	    value.bind( function( newval ) {
	        $('body, .andersen-post-meta, .andersen-comments-toggle,ol.commentlist li div.comment-metadata a, .andersen-indexpost-item .andersen-indexpost-item-inner .andersen-indexpost-meta, .aesop-story-highlights-shortcode p, .andersen-page-links span, .andersen-page-links .page-numbers,.andersen-widget a,.aesop-story-highlights-widget p,.aesop-story-highlights-widget .aesop-story-highlights-title,.andersen-sb-heading,.aesop-parallax-sc-caption-wrap,.aesop-image-component .aesop-img-enlarge, .aesop-image-component .aesop-image-component-caption').css('color', newval );
	    });
	});

	//Update site linkcolor
	wp.customize( 'andersen_link_color', function( value ) {
	    value.bind( function( newval ) {
	        $('a,a:hover,.andersen-indexpost-item .andersen-indexpost-item-inner .andersen-indexpost-readmore, .andersen-indexpost-item .andersen-indexpost-item-inner .andersen-indexpost-entry-title a:hover,.andersen-nav-menu li a:hover,.andersen-nav-menu li a,.andersen-nav-menu li.current-menu-item a, .andersen-post-meta .andersen-cat-links a:hover, .andersen-post-meta .andersen-tag-links a:hover,.andersen-comments-toggle:hover').css('color', newval );
	   	    $('.btn, .btn:hover, input[type=submit], input[type=reset], input[type=button], input[type=button]:hover,.andersen-meta-block').css('background-color', newval );
	    });
	});

	//Update Footer Text
	wp.customize( 'andersen_footer_text', function( value ) {
	    value.bind( function( newval ) {
	        $('.andersen-footer-text').html( newval );
	    });
	});

})( jQuery );