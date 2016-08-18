<?php
//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Genesis Sample Theme' );
define( 'CHILD_THEME_URL', 'http://www.studiopress.com/' );
define( 'CHILD_THEME_VERSION', '2.2.2' );

//* Enqueue Google Fonts
add_action( 'wp_enqueue_scripts', 'genesis_sample_google_fonts' );
function genesis_sample_google_fonts() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lato:300,400,700', array(), CHILD_THEME_VERSION );

}

//* Enqueue scripts and styles
add_action( 'wp_enqueue_scripts', 'everest_scripts_styles' );
function everest_scripts_styles() {

	wp_enqueue_style( 'google-fonts', '//fonts.googleapis.com/css?family=Lora:400,400italic,700,700italic|Poppins:400,500,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'ionicons', '//code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css', array(), CHILD_THEME_VERSION );

	wp_enqueue_script( 'everest-fadeup-script', get_stylesheet_directory_uri() . '/js/fadeup.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'everest-site-header', get_stylesheet_directory_uri() . '/js/site-header.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'everest-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
	$output = array(
		'mainMenu' => __( 'Menu', 'everest' ),
		'subMenu'  => __( 'Menu', 'everest' ),
	);
	wp_localize_script( 'everest-responsive-menu', 'everestL10n', $output );

}

//* Enqueue Custom Stylesheet
add_action( 'wp_enqueue_scripts', 'custom_load_custom_style_sheet' );
function custom_load_custom_style_sheet() {
 wp_enqueue_style( 'custom-stylesheet', CHILD_URL . '/custom.css', array(), PARENT_THEME_VERSION );
}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( 'headings', 'drop-down-menu',  'search-form', 'skip-links', 'rems' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Setup widget counts
function everest_count_widgets( $id ) {

	global $sidebars_widgets;

	if ( isset( $sidebars_widgets[ $id ] ) ) {
		return count( $sidebars_widgets[ $id ] );
	}

}

//* Flexible widget classes
function everest_widget_area_class( $id ) {

	$count = everest_count_widgets( $id );

	$class = '';

	if ( $count == 1 ) {
		$class .= ' widget-full';
	} elseif ( $count % 3 == 1 ) {
		$class .= ' widget-thirds';
	} elseif ( $count % 4 == 1 ) {
		$class .= ' widget-fourths';
	} elseif ( $count % 2 == 0 ) {
		$class .= ' widget-halves uneven';
	} else {	
		$class .= ' widget-halves even';
	}

	return $class;

}

//* Flexible widget classes
function everest_halves_widget_area_class( $id ) {

	$count = everest_count_widgets( $id );

	$class = '';

	if ( $count == 1 ) {
		$class .= ' widget-full';
	} elseif ( $count % 2 == 0 ) {
		$class .= ' widget-halves';
	} else {	
		$class .= ' widget-halves uneven';
	}

	return $class;

}

//* Add support for 3-column footer widget
add_theme_support( 'genesis-footer-widgets', 3 );

//* Register widget areas
genesis_register_sidebar( array(
	'id'          => 'front-page-main',
	'name'        => __( 'Front Page Main', 'everest' ),
	'description' => __( 'This is the 3rd section on the front page.', 'everest' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-1',
	'name'        => __( 'Front Page 1', 'everest' ),
	'description' => __( 'This is the 1st section on the front page.', 'everest' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-2',
	'name'        => __( 'Front Page 2', 'everest' ),
	'description' => __( 'This is the 2nd section on the front page.', 'everest' ),
) );
genesis_register_sidebar( array(
	'id'          => 'front-page-3',
	'name'        => __( 'Front Page 3', 'everest' ),
	'description' => __( 'This is the 3rd section on the front page.', 'everest' ),
) );

//* Change the footer text
add_filter('genesis_footer_creds_text', 'sp_footer_creds_filter');
function sp_footer_creds_filter( $creds ) {
	$creds = '[footer_copyright] Everest Sciences &middot; Proudly designed, developed, and maintained by <a href="http://byerscreative.com">Byers Creative</a> &middot; Built on the <a href="http://www.studiopress.com/themes/genesis" title="Genesis Framework">Genesis Framework</a>. Powered by <a href="http://wordpress.org">Wordpress</a>.';
	return $creds;
}