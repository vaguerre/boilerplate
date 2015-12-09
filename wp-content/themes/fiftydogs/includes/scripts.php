<?php
/**
 * Fifty Dogs Script Functions
 *
 * @package Fifty Dogs
 * 
 * @since   1.0
 */ 

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;
 

/**
 * Enqueue scripts and styles. 
 * @return [type] [description]
 */
function fiftydogs_enqueue_scripts_styles(){

  $component_path = get_stylesheet_directory_uri() . '/assets/components/';
  $js_path        = get_stylesheet_directory_uri() . '/assets/js/';
  $css_path       = get_stylesheet_directory_uri() . '/assets/css/';

  //
  wp_enqueue_script( 'jquery' ); // No conflict mode
  
  /**
   * Javascript 
   * Register & enqueue scripts
   */  
  wp_register_script( 'fiftydogs-app', $js_path . 'app.js', array('jquery'), FIFTYDOGS_VERSION, true );
  wp_enqueue_script( 'fiftydogs-app' ); 

  /**
   * Styles
   * Register & enqueue styles
   *
   * component vendor styles, and core app css
   */
  wp_enqueue_style( 'fiftydogs-style', $css_path . 'style.min.css', '', FIFTYDOGS_VERSION );
}
add_action( 'wp_enqueue_scripts', 'fiftydogs_enqueue_scripts_styles' );