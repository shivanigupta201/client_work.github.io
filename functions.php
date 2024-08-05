<?php
/**
 * OnyxPulse functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package OnyxPulse
 * @since OnyxPulse 1.0
 */
declare( strict_types = 1 );

if ( ! function_exists( 'onyxpulse_support' ) ) :

	/**
	 * Sets up theme defaults and registers support for various WordPress functionalities.
	 *
	 * @since OnyxPulse 1.0
	 *
	 * @return void
	 */
	function onyxpulse_support() {

		// Enqueue editor styles.
		add_editor_style( 'style.css' );

		// Make theme available for translation.
		load_theme_textdomain( 'onyxpulse' );
	}

endif;

add_action( 'after_setup_theme', 'onyxpulse_support' );

if ( ! function_exists( 'onyxpulse_styles' ) ) :

	/**
	 * Enqueue styles.
	 *
	 * @since OnyxPulse 1.0
	 *
	 * @return void
	 */
	function onyxpulse_styles() {

		// Register theme stylesheet.
		wp_register_style(
			'onyxpulse-style',
			get_stylesheet_directory_uri() . '/style.css',
			array(),
			wp_get_theme()->get( 'Version' )
		);

		// Enqueue theme stylesheet.
		wp_enqueue_style( 'onyxpulse-style' );

	}

endif;

add_action( 'wp_enqueue_scripts', 'onyxpulse_styles' );



// 1801


function my_custom_menus() {
    register_nav_menus(
        array(
            'header-menu' => __( 'Header Menu' ),
            'footer-menu' => __( 'Footer Menu' )
        )
    );
}
add_action( 'init', 'my_custom_menus' );


function enqueue_designSheet_styles(){
	$path= get_template_directory_uri()."/assets/css/styles-new.css";
	wp_enqueue_style('styles-new',$path);
}
add_action('wp_enqueue_scripts','enqueue_designSheet_styles');


function enqueue_designSheet_scripts(){
	$path= get_template_directory_uri()."/assets/js/custom.js";
	wp_enqueue_script('custom-new',$path,true);
}
add_action('wp_enqueue_scripts','enqueue_designSheet_scripts');


function my_theme_customizer_register( $wp_customize ) {
    // Add a new section
    $wp_customize->add_section( 'my_custom_section', array(
        'title'    => __( 'My Custom Section', 'textdomain' ),
        'priority' => 30,
    ) );

    // Add a new setting
    $wp_customize->add_setting( 'my_custom_setting', array(
        'default'   => '',
        'transport' => 'refresh',
    ) );

    // Add a new control
    $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'my_custom_setting_control', array(
        'label'    => __( 'My Custom Setting', 'textdomain' ),
        'section'  => 'my_custom_section',
        'settings' => 'my_custom_setting',
        'type'     => 'text', // You can use 'text', 'checkbox', 'radio', 'select', 'textarea', etc.
    ) ) );
}
add_action( 'customize_register', 'my_theme_customizer_register' );
