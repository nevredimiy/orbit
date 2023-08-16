<?php

/**
 *
 * @link              https://writecode6.wordpress.com/%d0%be%d0%b1%d0%be-%d0%bc%d0%bd%d0%b5/
 * @since             1.0.0
 * @package           Orbit_Menu
 *
 * @wordpress-plugin
 * Plugin Name:       OrbitMenu
 * Plugin URI:        https://writecode6.wordpress.com/2023/08/15/%D0%BC%D0%B5%D0%BD%D1%8E-%D0%BE%D1%80%D0%B1%D0%B8%D1%82%D0%B0-%D0%BF%D0%BB%D0%B0%D0%B3%D0%B8%D0%BD-%D0%B4%D0%BB%D1%8F-wordpress/
 * Description:       The plugin creates a menu that is arranged in a circle. Smooth appearance
 * Version:           1.0.0
 * Author:            Artem Litvinov
 * Author URI:        https://writecode6.wordpress.com/%d0%be%d0%b1%d0%be-%d0%bc%d0%bd%d0%b5/
 * Text Domain:       orbit-menu
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function orbit_debug( $data ) {
	echo '<pre>' . print_r( $data, 1 ) . '</pre>';
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'ORBIT_MENU_VERSION', '1.0.0' );


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-orbit-menu-activator.php
 */
function activate_orbit_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-orbit-menu-activator.php';
	Orbit_Menu_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-orbit-menu-deactivator.php
 */
function deactivate_orbit_menu() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-orbit-menu-deactivator.php';
	Orbit_Menu_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_orbit_menu' );
register_deactivation_hook( __FILE__, 'deactivate_orbit_menu' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-orbit-menu.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_orbit_menu() {

	$plugin = new Orbit_Menu();
	$plugin->run();

}
run_orbit_menu();
