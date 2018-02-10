<?php

/**
 * Theme Setup
 * @since 1.0.0
 *
 * This setup function attaches all of the site-wide functions
 * to the correct hooks and filters. All the functions themselves
 * are defined below this setup function.
 *
 */

add_action( 'genesis_setup','child_theme_setup', 15 );
function child_theme_setup() {

	/****************************************
	Define child theme GLOBAL VARIABLES
    *****************************************/
    define('LCO_THEME', 'genesis-material-design-lite-child-theme');

	/****************************************
	Define child theme version
	*****************************************/

	define( 'CHILD_THEME_VERSION', filemtime( get_stylesheet_directory() . '/style.css' ) );


	/****************************************
	Include Genesis base functions
	*****************************************/

	include_once( CHILD_DIR . '/lib/genesis.php' );

	/****************************************
	Include theme helper functions
	*****************************************/

	include_once( CHILD_DIR . '/lib/theme-helpers.php' );


	/****************************************
	Setup child theme functions
	*****************************************/

	include_once( CHILD_DIR . '/lib/theme-functions.php' );


	/****************************************
	Structure set up
	****************************************/


	// Structure (corresponds to Genesis's lib/structure)
    include_once( CHILD_DIR . '/lib/structure/archive.php' );
    include_once( CHILD_DIR . '/lib/structure/breadcrumbs.php' );
    include_once( CHILD_DIR . '/lib/structure/footer.php' );
    include_once( CHILD_DIR . '/lib/structure/gallery.php' );
    include_once( CHILD_DIR . '/lib/structure/head.php' );
    include_once( CHILD_DIR . '/lib/structure/header.php' );
    //include_once( CHILD_DIR . '/lib/structure/loops.php' );
    include_once( CHILD_DIR . '/lib/structure/menu.php' );
    include_once( CHILD_DIR . '/lib/structure/post.php' );
    include_once( CHILD_DIR . '/lib/structure/scripts.php' );
    include_once( CHILD_DIR . '/lib/structure/search.php' );
    include_once( CHILD_DIR . '/lib/structure/sidebar.php' );

    // Mdl modifications
    include_once( CHILD_DIR . '/lib/mdl/archive.php' );
    include_once( CHILD_DIR . '/lib/mdl/footer.php' );
    include_once( CHILD_DIR . '/lib/mdl/header.php' );
    include_once( CHILD_DIR . '/lib/mdl/markup.php' );
    include_once( CHILD_DIR . '/lib/mdl/menu-walker.php' );
    include_once( CHILD_DIR . '/lib/mdl/menu.php' );
    include_once( CHILD_DIR . '/lib/mdl/pagination.php' );
    include_once( CHILD_DIR . '/lib/mdl/post.php' );
    include_once( CHILD_DIR . '/lib/mdl/search.php' );

	// Custom Post type
    // include_once( CHILD_DIR . '/lib/cpt/theme-cpt.php' );

	/****************************************
	LearnC Online Widget creation
	****************************************/
    include_once( CHILD_DIR . '/widgets/master_with_practice.php' );
    include_once( CHILD_DIR . '/widgets/contact_us.php' );
    include_once( CHILD_DIR . '/widgets/content.php' );

	/****************************************
     LearnC Online shortcodes creation
     ****************************************/
    include_once( CHILD_DIR . '/shortcodes/render-practice-features.php' );
    include_once( CHILD_DIR . '/shortcodes/practice-subscribe.php' );
    include_once( CHILD_DIR . '/shortcodes/render-content-markup.php' );



}
add_action('after_setup_theme', 'gmdl_theme_setup');
function gmdl_theme_setup(){
    load_theme_textdomain('genesis-material-design-lite-child-theme', get_stylesheet_directory() . '/languages');
}
