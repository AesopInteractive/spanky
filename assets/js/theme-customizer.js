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
	        $('.spanky-site-title a').html( newval );
	    });
	});

	//Update site background color...
	wp.customize( 'spanky_background_color', function( value ) {
	    value.bind( function( newval ) {
	        $('body,.aesop-parallax-sc-caption-wrap').css('background-color', newval );
	        $('.spanky-post-meta .spanky-cat-links span, .spanky-post-meta .spanky-tag-links span').css('color', newval );
	    });
	});

	//Update site text color
	wp.customize( 'spanky_text_color', function( value ) {
	    value.bind( function( newval ) {
	        $('body, .spanky-post-meta, .spanky-comments-toggle,ol.commentlist li div.comment-metadata a, .spanky-indexpost-item .spanky-indexpost-item-inner .spanky-indexpost-meta, .aesop-story-highlights-shortcode p, .spanky-page-links span, .spanky-page-links .page-numbers,.spanky-widget a,.aesop-story-highlights-widget p,.aesop-story-highlights-widget .aesop-story-highlights-title,.spanky-sb-heading,.aesop-parallax-sc-caption-wrap,.aesop-image-component .aesop-img-enlarge, .aesop-image-component .aesop-image-component-caption').css('color', newval );
	    });
	});

	//Update site linkcolor
	wp.customize( 'spanky_link_color', function( value ) {
	    value.bind( function( newval ) {
	        $('a,a:hover,.spanky-indexpost-item .spanky-indexpost-item-inner .spanky-indexpost-readmore, .spanky-indexpost-item .spanky-indexpost-item-inner .spanky-indexpost-entry-title a:hover,.spanky-nav-menu li a:hover,.spanky-nav-menu li a,.spanky-nav-menu li.current-menu-item a, .spanky-post-meta .spanky-cat-links a:hover, .spanky-post-meta .spanky-tag-links a:hover,.spanky-comments-toggle:hover').css('color', newval );
	   	    $('.btn, .btn:hover, input[type=submit], input[type=reset], input[type=button], input[type=button]:hover,.spanky-meta-block').css('background-color', newval );
	    });
	});

	//Update Footer Text
	wp.customize( 'spanky_footer_text', function( value ) {
	    value.bind( function( newval ) {
	        $('.spanky-footer-text').html( newval );
	    });
	});

})( jQuery );