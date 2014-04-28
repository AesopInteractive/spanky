<?php

function andersen_custom_register($wp_customize){
	if ( ! class_exists( 'Spanky_WP_Customize_Textarea_Control' ) ) {
	    class Spanky_WP_Customize_Textarea_Control extends WP_Customize_Control {
	    	public $type = 'textarea';

	    	public function render_content() {
	    		?>
	    		<label>
	    			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
	    			<textarea style="width: 100%;" rows="5" <?php $this->link(); ?>><?php echo esc_attr( $this->value() ); ?></textarea>
	    		</label>
	    		<?php
	    	}
	    }
	}
}
add_action( 'customize_register', 'andersen_custom_register' );

class andersenCustomizer {

	// add new options to new section
	public static function register($wp_customize){

		// APPEARENCE
		$wp_customize->add_section( 'andersen_appearence', array(
			'title' 	=> __( 'Andersen', 'andersen' ),
			'priority' 	=> 110
		) );

		// Logo
		$wp_customize->add_setting( 'andersen_site_logo', array(
			'type'		=> 'theme_mod',
			'transport' => 'postMessage'
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'andersen_site_logo', array(
			'label' => __( 'Site Logo (optional)', 'andersen' ),
			'section' => 'andersen_appearence',
			'settings' => 'andersen_site_logo',
		) ) );

		// BG Color
		$wp_customize->add_setting( 'andersen_background_color', array(
			'type'		=> 'theme_mod',
			'transport' => 'postMessage',
			'default'	=> '#FFFFFF',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'andersen_background_color', array(
			'label' 	=> __('Background', 'andersen'),
			'section' 	=> 'andersen_appearence',
			'settings' 	=> 'andersen_background_color'
		) ) );

		// Index Text COlor
		$wp_customize->add_setting( 'andersen_text_color', array(
			'type' 		=> 'theme_mod',
			'transport' => 'postMessage',
			'default'	=> '#494949',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'andersen_text_color', array(
			'label' 	=> __('Text', 'andersen'),
			'section' 	=> 'andersen_appearence',
			'settings' 	=> 'andersen_text_color'
		) ) );

		// Link COlor
		$wp_customize->add_setting( 'andersen_link_color', array(
			'type' 		=> 'theme_mod',
			'transport' => 'postMessage',
			'default'	=> '#428bca',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'andersen_link_color', array(
			'label' 	=> __('Link', 'andersen'),
			'section' 	=> 'andersen_appearence',
			'settings' 	=> 'andersen_link_color'
		) ) );

		// Footer Text
		$wp_customize->add_setting( 'andersen_footer_text', array(
            'default'    =>  '<a href="http://wordpress.org">Proudly powered by WordPress</a>',
            'type'       => 'theme_mod',
            'transport'  => 'postMessage',
            'sanitize_callback' => self::sanitize_text_field(),
        ) );
        $wp_customize->add_control( new Spanky_WP_Customize_Textarea_Control( $wp_customize, 'andersen_footer_text', array(
            'label'    	=> __( 'Footer Text', 'flacker' ),
            'section'  	=> 'andersen_appearence',
            'settings' 	=> 'andersen_footer_text',
        ) ) );

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	}

   	public static function live_preview() {
      	wp_enqueue_script('andersen-themecustomizer', ANDERSEN_THEME_URL.'/assets/js/theme-customizer.js', array( 'jquery','customize-preview' ),	ANDERSEN_THEME_VERSION, true);
   	}

	public static function header_output() {

 		$bgcolor 	= get_theme_mod('andersen_background_color');
 		$linkcolor 	= get_theme_mod('andersen_link_color');
 		$textcolor 	= get_theme_mod('andersen_text_color');

      	?>
      	<!--Customizer CSS-->
      	<style type="text/css">
           	<?php

	           	// text color
	           	if ( !empty ( $textcolor ) ) {
	           		self::generate_css('body, .andersen-post-meta, .andersen-comments-toggle,ol.commentlist li div.comment-metadata a, .andersen-indexpost-item .andersen-indexpost-item-inner .andersen-indexpost-meta, .aesop-story-highlights-shortcode p, .andersen-page-links span, .andersen-page-links .page-numbers,.andersen-widget a,.aesop-story-highlights-widget p,.aesop-story-highlights-widget .aesop-story-highlights-title,.andersen-sb-heading,.aesop-parallax-sc-caption-wrap,.aesop-image-component .aesop-img-enlarge, .aesop-image-component .aesop-image-component-caption', 'color', 'andersen_text_color');
	           	}

	           	// backgrond color
				if ( !empty ( $bgcolor ) ) {
	           		self::generate_css('body,.aesop-parallax-sc-caption-wrap', 'background-color', 'andersen_background_color');
	           		self::generate_css('.andersen-post-meta .andersen-cat-links span, .andersen-post-meta .andersen-tag-links span', 'color', 'andersen_background_color');

	           		$dark 		=   andersen_darken($bgcolor, 1.3);
	           		$darker 	=  	andersen_darken($bgcolor, 1.5);
	           		$darkest 	=	andersen_darken($bgcolor, 1.7);

	           		?>

	           		.andersen-page-links span, 
	           		.andersen-page-links .page-numbers,
	           		.andersen-post-meta,
	           		.andersen-content-left{
						background:<?php echo $dark;?>;
	           		}
	           		.aesop-story-highlights-shortcode {
	           			border-left:1px solid <?php echo $dark;?>;
	           		}
	           		.andersen-post-meta,
	           		.andersen-index-listing .andersen-indexpost-item {
	           			border-top:1px solid <?php echo $dark;?>;
	           		}
	           		.menu-open .andersen-nav-menu li a,
	           		.andersen-comments-wrap #andersen-comments,
	           		.andersen-post-meta {
	           			border-bottom:1px solid <?php echo $dark;?>;
	           		}
	           		[class*=andersen-index-listing-] .andersen-indexpost-item:first-child,
	           		ol.commentlist .children li {
	           			border-top:1px solid <?php echo $dark;?>;
	           		}
	           		.andersen-page-links span, .andersen-page-links .page-numbers {
	           			border:1px solid <?php echo $dark;?>;
	           		}
	           		.aesop-story-highlights-widget .aesop-story-highlights-title,
	           		.andersen-sb-heading {
	           			background:<?php echo $darker;?>;
	           		}
	           		.andersen-img {
	           			border:4px solid <?php echo $darker;?>;
	           		}
	           		.andersen-brand-block,
	           		.andersen-header {
	           			background:<?php echo $darkest;?>;
	           		}
	           		<?php
	      		}

	      		// link color
	      		if ( !empty ( $linkcolor ) ) {
	           		self::generate_css('a,a:hover,.andersen-indexpost-item .andersen-indexpost-item-inner .andersen-indexpost-readmore, .andersen-indexpost-item .andersen-indexpost-item-inner .andersen-indexpost-entry-title a:hover,.andersen-nav-menu li a:hover,.andersen-nav-menu li a,.andersen-nav-menu li.current-menu-item a, .andersen-post-meta .andersen-cat-links a:hover, .andersen-post-meta .andersen-tag-links a:hover,.andersen-comments-toggle:hover', 'color', 'andersen_link_color');
	           		self::generate_css('.btn, .btn:hover, input[type=submit], input[type=reset], input[type=button], input[type=button]:hover,.andersen-meta-block', 'background-color', 'andersen_link_color');

	      			?>
	      			.btn {
	      				border:1px solid <?php echo andersen_darken($linkcolor,1.1);?>;
	      			}
	      			.andersen-meta-block .andersen-meta-block-author .avatar,
	      			.btn:hover {
	      				border:1px solid <?php echo andersen_darken($linkcolor,1.2);?>;
	      				background: <?php echo andersen_darken($linkcolor,1.2);?>;
	      			}
	      			<?php

	      		}

      		?>
      	</style>
      	<!--/Customizer CSS-->

	<?php }

    public static function generate_css( $selector, $style, $mod_name, $prefix='', $postfix='', $echo=true ) {
      $return = '';
      $mod = get_theme_mod($mod_name);
      if ( ! empty( $mod ) ) {
         $return = sprintf('%s { %s:%s; }',
            $selector,
            $style,
            $prefix.$mod.$postfix
         );
         if ( $echo ) {
            echo $return;
         }
      }
      return $return;
    }

	private static function sanitize_text_field( $input = ''  ) {
		return sanitize_text_field( $input );
	}

	private static function sanitize_int( $input = ''  ) {
		return wp_filter_nohtml_kses( round( $input ) );

	}

}
// Setup the Theme Customizer settings and controls...
add_action( 'customize_register' , array( 'andersenCustomizer' , 'register' ) );
add_action( 'wp_head' , array( 'andersenCustomizer' , 'header_output' ) );
add_action( 'customize_preview_init' , array( 'andersenCustomizer' , 'live_preview' ) );


