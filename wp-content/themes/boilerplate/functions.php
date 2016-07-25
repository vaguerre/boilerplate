<?php
/**
 * Fifty Boilerplate functions and definitions 
 *
 * @package WordPress
 * @subpackage Fifty Boilerplate
 * @since Fifty Boilerplate 1.0
 */

if ( ! isset( $content_width ) ) {
  // $content_width = 800;
}

/**
 * Define the version in case we need to do version checks. 
 */
if ( ! defined( 'FIFTYBOILERPLATE_VERSION' ) )
  define( 'FIFTYBOILERPLATE_VERSION', '1.0' );



if ( ! function_exists( 'fiftyboilerplate_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 *
 * @since Fifty Boilerplate 1.0
 */
function fiftyboilerplate_setup() {

  /*
   * Make theme available for translation.
   * Translations can be filed in the /languages/ directory.
   * If you're building a theme based on fiftyboilerplate, use a find and replace
   * to change 'fiftyboilerplate' to the name of your theme in all the template files
   */
  load_theme_textdomain( 'fiftyboilerplate', get_template_directory() . '/languages' );

  // Add default posts and comments RSS feed links to head.
  add_theme_support( 'automatic-feed-links' );

  /*
   * Let WordPress manage the document title.
   * By adding theme support, we declare that this theme does not use a
   * hard-coded <title> tag in the document head, and expect WordPress to
   * provide it for us.
   */
  add_theme_support( 'title-tag' );

  /*
   * Enable support for Post Thumbnails on posts and pages.
   *
   * See: https://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
   */
  add_theme_support( 'post-thumbnails' );

  /**
   * Enapble support for excerpts on pages
   */
  add_post_type_support( 'page', 'excerpt' );


  /*
   * Menus
   */
  register_nav_menus( array(
    'main_menu'          => __( 'Main Menu', 'fiftyboilerplate' ),
    'footer_menu'        => __( 'Footer Menu', 'fiftyboilerplate' ),
  ) );


  /*
   * Switch default core markup for search form, comment form, and comments
   * to output valid HTML5.
   */
  add_theme_support( 'html5', array(
    'search-form', 'comment-form', 'comment-list', 'gallery', 'caption'
  ) );

}
endif; // fiftyboilerplate_setup
add_action( 'after_setup_theme', 'fiftyboilerplate_setup' );



/**
 * Include files using the init.
 * @return [type] [description]
 */
function fiftyboilerplate_init()
{
  // Load Scripts
  require_once get_stylesheet_directory() . '/includes/scripts.php';

  // Load Image Functions 
  require_once get_stylesheet_directory() . '/includes/images.php';  

  // Load Misc Functions
  require_once get_stylesheet_directory() . '/includes/misc.php';    

  // Load CMB2 Fields
  // require_once get_stylesheet_directory() . '/includes/cmb2-fields.php';    
  // require_once get_stylesheet_directory() . '/includes/cmb2-misc.php';
  // require_once get_stylesheet_directory() . '/includes/cmb2-options-page.php';    
}
add_action( 'init', 'fiftyboilerplate_init' );