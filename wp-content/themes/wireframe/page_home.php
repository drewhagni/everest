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

/**
 * This removes the loop.
 * If you want to include the static page title and content,
 * remove or comment out this code.
 */
remove_action( 'genesis_loop', 'genesis_do_loop' );
 
add_action( 'genesis_loop', 'home_structure_loop' );
/**
 * This builds the video blog loop. 
 * The blog options in the Genesis Theme Settings are applied.
 * A custom field on the page with the name query_args can be used.
 * This will change the posts and videos pulled into the loop.
 * By default it will pull in all posts and videos.
 */
function home_structure_loop() {

include('home.html');
 
}

//loads the framework
genesis();