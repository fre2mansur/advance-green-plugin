<?php

/**
 * The plugin bootstrap file
 *
 *
 * @link              administrator
 * @since             1.0.0
 * @package           Advance_Green_Plugin
 *
 * @wordpress-plugin
 *Plugin Name: Auroville Green Practices Plugin
 *Plugin URI: https://github.com/kshitijbhatt/
 *Description: Advanced Custom Post types for Auroville Green Practices Workshops.
 *Version: 1.0.0
 *Author: Kshitij Bhatt
 *Author URI: http://www.hangar18.studio/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       advance-green-plugin
 * Domain Path:       /languages
 */

// If this file is called directly, abort.

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! defined( 'WPINC' ) ) {
	die;
}


/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'PLUGIN_NAME_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-advance-green-plugin-activator.php
 */
function activate_advance_green_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advance-green-plugin-activator.php';
	$activator = new Advance_Green_Plugin_Activator();
	$activator->activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-advance-green-plugin-deactivator.php
 */
function deactivate_advance_green_plugin() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-advance-green-plugin-deactivator.php';
	Advance_Green_Plugin_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_advance_green_plugin' );
register_deactivation_hook( __FILE__, 'deactivate_advance_green_plugin' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-advance-green-plugin.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_advance_green_plugin() {

	$plugin = new Advance_Green_Plugin();
	$plugin->run();

}
run_advance_green_plugin();
