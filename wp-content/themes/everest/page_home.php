<?php
/**
 * Genesis Framework.
 *
 * @package Genesis\Templates
 * @author  StudioPress
 * @license GPL-2.0+
 * @link    http://my.studiopress.com/themes/genesis/
 */

//* Template Name: Home

add_action( 'genesis_meta', 'everest_front_page_genesis_meta' );
/**
 * Add widget support for homepage. If no widgets active, display the default loop.
 *
 */
function everest_front_page_genesis_meta() {

	if ( is_active_sidebar( 'front-page-main' ) || is_active_sidebar( 'front-page-1' ) || is_active_sidebar( 'front-page-2' ) || is_active_sidebar( 'front-page-3' ) ) {

		//* Enqueue scripts
		add_action( 'wp_enqueue_scripts', 'everest_enqueue_everest_script' );
		function everest_enqueue_everest_script() {

			wp_register_style( 'everestIE9', get_stylesheet_directory_uri() . '/style-ie9.css', array(), CHILD_THEME_VERSION );
			wp_style_add_data( 'everestIE9', 'conditional', 'IE 9' );
			wp_enqueue_style( 'everestIE9' );

			wp_enqueue_script( 'localScroll', get_stylesheet_directory_uri() . '/js/jquery.localScroll.min.js', array( 'scrollTo' ), '1.2.8b', true );
			wp_enqueue_script( 'scrollTo', get_stylesheet_directory_uri() . '/js/jquery.scrollTo.min.js', array( 'jquery' ), '1.4.5-beta', true );


		}

		//* Add front-page body class
		add_filter( 'body_class', 'everest_body_class' );
		function everest_body_class( $classes ) {

			$classes[] = 'front-page';

			return $classes;

		}

		//* Force full width content layout
		add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

		//* Remove breadcrumbs
		remove_action( 'genesis_before_loop', 'genesis_do_breadcrumbs' );

		//* Add widgets on front page
		add_action( 'genesis_after_header', 'everest_front_page_widgets' );

		$journal = get_option( 'everest_journal_setting', 'true' );

		if ( 'true' === $journal ) {

			//* Add opening markup for blog section
			add_action( 'genesis_before_loop', 'everest_front_page_blog_open' );

			//* Add closing markup for blog section
			add_action( 'genesis_after_loop', 'everest_front_page_blog_close' );

		} else {

			//* Remove the default Genesis loop
			remove_action( 'genesis_loop', 'genesis_do_loop' );

			//* Remove .site-inner
			add_filter( 'genesis_markup_site-inner', '__return_null' );
			add_filter( 'genesis_markup_content-sidebar-wrap_output', '__return_false' );
			add_filter( 'genesis_markup_content', '__return_null' );

		}

	}

}

//* Add widgets on front page
function everest_front_page_widgets() {

	if ( get_query_var( 'paged' ) >= 2 )
		return;

	echo '<h2 class="screen-reader-text">' . __( 'Main Content', 'everest' ) . '</h2>';

	genesis_widget_area( 'front-page-main', array(
		'before' => '<div id="front-page-main" class="front-page-main"><div class="widget-area fadeup-effect"><div class="wrap">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-1', array(
		'before' => '<div id="front-page-1" class="front-page-1"><div class="wrap"><div class="flexible-widgets widget-area fadeup-effect' . everest_halves_widget_area_class( 'front-page-1' ) . '">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-2', array(
		'before' => '<div id="front-page-2" class="front-page-2"><div class="wrap"><div class="flexible-widgets widget-area fadeup-effect' . everest_halves_widget_area_class( 'front-page-2' ) . '">',
		'after'  => '</div></div></div>',
	) );

	genesis_widget_area( 'front-page-3', array(
		'before' => '<div id="front-page-3" class="front-page-3"><div class="wrap"><div class="flexible-widgets widget-area fadeup-effect' . everest_widget_area_class( 'front-page-3' ) . '">',
		'after'  => '</div></div></div>',
	) );

}

//* Add closing markup for blog section
function everest_front_page_blog_close() {

	if ( 'posts' == get_option( 'show_on_front' ) ) {

		echo '</div></div>';

	}

}

			remove_action( 'genesis_loop', 'genesis_do_loop' );


//* Run the Genesis function
genesis();
