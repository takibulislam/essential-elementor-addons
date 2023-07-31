<?php
/**
 * Plugin Name: Essential Elementor Widgets
 * Description: My Fist widget development for Elementor
 * Plugin URI:  https://www.facebook.com/takibulislam.fuad/
 * Version:     10.0.0
 * Author:      Takibul Islam
 * Text Domain: essential-elementor-widgets
 *
 * Elementor tested up to: 3.7.0
 * Elementor Pro tested up to: 3.7.0
 */



 /**Check for security */
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register Essential Elementor Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_essential_widgets( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/card-widgets.php' );

	$widgets_manager->register( new \essential_elementor_card_Widget() );

}
add_action( 'elementor/widgets/register', 'register_essential_widgets' );