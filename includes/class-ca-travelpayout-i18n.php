<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://https://www.fiverr.com/wpdevmehedi
 * @since      1.0.0
 *
 * @package    Ca_Travelpayout
 * @subpackage Ca_Travelpayout/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Ca_Travelpayout
 * @subpackage Ca_Travelpayout/includes
 * @author     Mehedi Hasan <wpdevmehedi@gmail.com>
 */
class Ca_Travelpayout_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'ca-travelpayout',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
