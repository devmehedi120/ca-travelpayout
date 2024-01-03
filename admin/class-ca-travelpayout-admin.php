<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://https://www.fiverr.com/wpdevmehedi
 * @since      1.0.0
 *
 * @package    Ca_Travelpayout
 * @subpackage Ca_Travelpayout/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Ca_Travelpayout
 * @subpackage Ca_Travelpayout/admin
 * @author     Mehedi Hasan <wpdevmehedi@gmail.com>
 */
class Ca_Travelpayout_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ca-travelpayout-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ca-travelpayout-admin.js', array( 'jquery' ), $this->version, false );

	}

	function ca_menu_page(){
		 // Parameters for add_menu_page function
    $page_title = 'Flight Data By Travelpayout';
    $menu_title = 'Flight Data ';
    $capability = 'manage_options';
    $menu_slug = 'ca-flight-menu';
    $icon_url = 'dashicons-airplane';
    $position = 10;

    // Add a top-level menu page
    add_menu_page($page_title, $menu_title, $capability, $menu_slug, [$this, 'ca_flight_data_html'], $icon_url, $position);
	register_setting('travelpayoutSection', 'catpapiCode');
    register_setting('travelpayoutSection', 'catpredirectURL');

    add_settings_section('travelpayoutSection', '', '', 'travelpayoutPage');
    add_settings_field('pluginShortcode', 'Plugin Shortcode', [$this, 'plugin_shortcode'], 'travelpayoutPage', 'travelpayoutSection');
    add_settings_field('catpapiCode', 'Enter API code', [$this, 'catpAPI_cb'], 'travelpayoutPage', 'travelpayoutSection');
    add_settings_field('catpredirectURL', 'Enter redirect URL', [$this, 'cat_url_cb'], 'travelpayoutPage', 'travelpayoutSection');

	}

	function plugin_shortcode(){
		echo "<p><code>[flyghtShow]</code></p>";
	}
	
	function catpAPI_cb(){
		echo '<input class="widefat" type="text" name="catpapiCode" value="'.get_option('catpapiCode').'">';
	}

	function cat_url_cb(){
		echo '<input class="widefat" type="url" name="catpredirectURL" value="'.get_option('catpredirectURL').'">';
	}
   
	function ca_flight_data_html(){
		?>
		<h3>Settings</h3>
		<hr>

		<form style="width: 50%" action="options.php" method="post">
			<?php
			settings_fields( "travelpayoutSection" );
			do_settings_sections( "travelpayoutPage" );
			submit_button( "Save changes", "button-primary" );
			?>
		</form>
		<?php
	}

// 	function ca_flight_data_html(){
// 		    ob_start();
// 			require_once plugin_dir_path( __FILE__ )."partials/shortcode.php";
// }

};