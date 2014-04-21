<?php

function spanky_custom_register($wp_customize){
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
add_action( 'customize_register', 'spanky_custom_register' );

class spankyCustomizer {

	// add new options to new section
	public static function register($wp_customize){

		// APPEARENCE
		$wp_customize->add_section( 'spanky_appearence', array(
			'title' 	=> __( 'Spanky', 'spanky' ),
			'priority' 	=> 110
		) );

		// Logo
		$wp_customize->add_setting( 'spanky_site_logo', array(
			'type'		=> 'theme_mod',
			'transport' => 'postMessage'
		) );
		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'spanky_site_logo', array(
			'label' => __( 'Site Logo (optional)', 'spanky' ),
			'section' => 'spanky_appearence',
			'settings' => 'spanky_site_logo',
		) ) );

		// BG Color
		$wp_customize->add_setting( 'spanky_background_color', array(
			'type'		=> 'theme_mod',
			'transport' => 'postMessage',
			'default'	=> '#FFFFFF',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'spanky_background_color', array(
			'label' 	=> __('Background', 'spanky'),
			'section' 	=> 'spanky_appearence',
			'settings' 	=> 'spanky_background_color'
		) ) );

		// Index Text COlor
		$wp_customize->add_setting( 'spanky_text_color', array(
			'type' 		=> 'theme_mod',
			'transport' => 'postMessage',
			'default'	=> '#494949',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'spanky_text_color', array(
			'label' 	=> __('Text', 'spanky'),
			'section' 	=> 'spanky_appearence',
			'settings' 	=> 'spanky_text_color'
		) ) );

		// Link COlor
		$wp_customize->add_setting( 'spanky_link_color', array(
			'type' 		=> 'theme_mod',
			'transport' => 'postMessage',
			'default'	=> '#428bca',
		) );
		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'spanky_link_color', array(
			'label' 	=> __('Link', 'spanky'),
			'section' 	=> 'spanky_appearence',
			'settings' 	=> 'spanky_link_color'
		) ) );

		// Footer Text
		$wp_customize->add_setting( 'spanky_footer_text', array(
            'default'    =>  '<a href="http://wordpress.org">Proudly powered by WordPress</a>',
            'type'       => 'theme_mod',
            'transport'  => 'postMessage',
            'sanitize_callback' => self::sanitize_text_field(),
        ) );
        $wp_customize->add_control( new Spanky_WP_Customize_Textarea_Control( $wp_customize, 'spanky_footer_text', array(
            'label'    	=> __( 'Footer Text', 'flacker' ),
            'section'  	=> 'spanky_appearence',
            'settings' 	=> 'spanky_footer_text',
        ) ) );

		$wp_customize->get_setting( 'blogname' )->transport = 'postMessage';
		$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	}

   	public static function live_preview() {
      	wp_enqueue_script('spanky-themecustomizer', SPANKY_THEME_URL.'/assets/js/theme-customizer.js', array( 'jquery','customize-preview' ),	SPANKY_THEME_VERSION, true);
   	}

	 public static function header_output() {

	 		$bgcolor = get_theme_mod('spanky_background_color');
	 		$linkcolor = get_theme_mod('spanky_link_color');

	      	?>
	      	<!--Customizer CSS--> 
	      	<style type="text/css">
	           <?php self::generate_css('', 'color', 'spanky_text_color'); ?> 
	           <?php self::generate_css('', 'background-color', 'spanky_background_color'); ?> 
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
add_action( 'customize_register' , array( 'spankyCustomizer' , 'register' ) );
add_action( 'wp_head' , array( 'spankyCustomizer' , 'header_output' ) );
add_action( 'customize_preview_init' , array( 'spankyCustomizer' , 'live_preview' ) );


