<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://https://www.fiverr.com/wpdevmehedi
 * @since             1.0.0
 * @package           Ca_Travelpayout
 *
 * @wordpress-plugin
 * Plugin Name:        Custom API Travelpayout
 * Plugin URI:        https://https://www.fiverr.com/wpdevmehedi
 * Description:       This is a description of the plugin.
 * Version:           1.3
 * Author:            Mehedi Hasan
 * Author URI:        https://https://www.fiverr.com/wpdevmehedi/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       ca-travelpayout
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'CA_TRAVELPAYOUT_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-ca-travelpayout-activator.php
 */
function activate_ca_travelpayout() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ca-travelpayout-activator.php';
	Ca_Travelpayout_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-ca-travelpayout-deactivator.php
 */
function deactivate_ca_travelpayout() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-ca-travelpayout-deactivator.php';
	Ca_Travelpayout_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_ca_travelpayout' );
register_deactivation_hook( __FILE__, 'deactivate_ca_travelpayout' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */

require plugin_dir_path( __FILE__ ) . 'includes/class-ca-travelpayout.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_ca_travelpayout() {

	$plugin = new Ca_Travelpayout();
	$plugin->run();

}
run_ca_travelpayout();
