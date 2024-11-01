<?php

/**
 * Plugin Name:       Slideshow Wp
 * Plugin URI:        http://beeplugins.com
 * Description:      Slideshow WP Is a responsive slider with touch and swipe slider.Slideshow WP supports two types of slider like fullwidth and carousel.
 * Version:           1.1
 * Author:            aumsrini
 * Author URI:        https://profiles.wordpress.org/aumsrini/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       slideshow-wp
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
require_once plugin_dir_path( __FILE__ ) . 'includes/sswp-functions.php';
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-slideshow-wp-activator.php
 */
function activate_slideshow_wp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-slideshow-wp-activator.php';
	Slideshow_Wp_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-slideshow-wp-deactivator.php
 */
function deactivate_slideshow_wp() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-slideshow-wp-deactivator.php';
	Slideshow_Wp_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_slideshow_wp' );
register_deactivation_hook( __FILE__, 'deactivate_slideshow_wp' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-slideshow-wp.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_slideshow_wp() {

	$plugin = new Slideshow_Wp();
	$plugin->run();

}
run_slideshow_wp();

if ( ! defined( 'WPINC' ) ) {
	die;
}

if ( ! defined( 'ABSPATH' ) ) exit; 

if ( ! class_exists( 'RW_Meta_Box' ) )
   { 
	require_once plugin_dir_path( __FILE__ ) . 'includes/framework/meta-box.php'; // Path to the plugin's main file

	
	}
	
if ( ! class_exists( 'MB_Columns' ) )
{
	require_once  plugin_dir_path( __FILE__ ) . 'includes/framework/extn/meta-box-columns/meta-box-columns.php'; // Path to the extension's main file
	}
	
	if ( ! function_exists( 'mb_settings_page_load' ) ) {
		require_once  plugin_dir_path( __FILE__ ) . 'includes/framework/extn/mb-settings-page/mb-settings-page.php';
	}
	
	if ( ! class_exists( 'RWMB_Group' ) ) {
	require_once  plugin_dir_path( __FILE__ ) . 'includes/framework/extn/meta-box-group/meta-box-group.php'; // Path to the extension's main file
	}
	
	if ( ! class_exists( 'MB_Tabs' ) )
{	
	require_once  plugin_dir_path( __FILE__ ) . 'includes/framework/extn/meta-box-tabs/meta-box-tabs.php'; // Path to the extension's main file
	
	}
		if ( ! class_exists( 'MB_Conditional_Logic' ) )
   { 
	require_once plugin_dir_path( __FILE__ ) . 'includes/framework/extn/meta-box-conditional-logic/meta-box-conditional-logic.php'; // Path to the plugin's main file

	
	}