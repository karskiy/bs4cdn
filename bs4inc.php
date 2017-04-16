<?php
/*
Plugin Name: Bootstrap 4 CDN
Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
Description: Плагин отключает библиотеку jQuery поставляемую с WordPress и подрубает 3-ю версию + CSS и JS Bootstrap 4
Version:     20170416
Author:      Karskiy
Author URI:  https://developer.wordpress.org/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: bs4inc
Domain Path: /languages
*/

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

//Create a function called "wporg_init" if it doesn't already exist
if ( !function_exists( 'krs_bs4' ) ) {
    function krs_bs4() {
		/**
 		* Enqueue scripts and styles.
 		*/
 		// https://developer.wordpress.org/themes/basics/including-css-javascript/#stylesheets
		wp_register_style( 'bootstrap-style', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css', NULL, '4.0.0', 'all' );
		// https://developer.wordpress.org/themes/basics/including-css-javascript/#scripts
		wp_deregister_script( 'jquery' );
		wp_register_script( 'jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', array(), '3.2.1', true );
		wp_register_script( 'tether', 'https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js', array( 'jquery' ), '3.3.7', true );
		wp_register_script( 'bootstrap', 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );

		wp_enqueue_style( 'bootstrap-style' );
		// Add our JavaScript plugins, jQuery, and Tether near the end of your pages, right before the closing </body> tag.
		wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'tether' );
		wp_enqueue_script( 'bootstrap' );			
    }   
}

add_action( 'wp_enqueue_scripts', 'krs_bs4' );