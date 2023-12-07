<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://https://www.fiverr.com/wpdevmehedi
 * @since      1.0.0
 *
 * @package    Ca_Travelpayout
 * @subpackage Ca_Travelpayout/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    Ca_Travelpayout
 * @subpackage Ca_Travelpayout/public
 * @author     Mehedi Hasan <wpdevmehedi@gmail.com>
 */
class Ca_Travelpayout_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;
	public $countries_names = [];

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;
		
		add_shortcode( 'flyghtShow', [$this, 'flyghtShowHtml'] );
		
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Ca_Travelpayout_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Ca_Travelpayout_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ca-travelpayout-public.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'card__style', plugin_dir_url( __FILE__ ) . 'css/ca-card-section.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'casearch__result', plugin_dir_url( __FILE__ ) . 'css/ca-search-result.css', array(), $this->version, 'all' );
		
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'vueGlobal', plugin_dir_url( __FILE__ ) . 'js/vue.global.js', array(  ), $this->version, false );
		wp_enqueue_script( 'uuidv4', plugin_dir_url( __FILE__ ) . 'js/uuidv4.js', array(  ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ca-travelpayout-public.js', array( 'jquery','vueGlobal' ), $this->version, false );
		wp_localize_script( $this->plugin_name, 'catp_fragments', array(
			'ajaxurl' => admin_url("admin-ajax.php")
		) );
	}
     
	function userLocatinByIP(){
		$ipObject = wp_remote_get( 'https://api.ipify.org?format=json' );
		$ipObject = wp_remote_retrieve_body($ipObject);
		$ipAddress = json_decode($ipObject)->ip;
        $locationURL = 'http://www.travelpayouts.com/whereami?locale=en&ip=' . $ipAddress;
		$countryData=wp_remote_get( $locationURL);
		if(is_wp_error($countryData)){
			return false;
		}
		$mainData=wp_remote_retrieve_body($countryData);
		$useralocationdata=json_decode($mainData);

		return $useralocationdata;
	}

	function popularCountries(){
		try {
			$data=(array)$this->userLocatinByIP();
			$iata=$data['iata'];
			$url= 'http://api.travelpayouts.com/v1/city-directions?origin='.$iata.'&currency=BDT&token=14a1d288b1b2f173ac139063e817575c';
			$dataResponse=wp_remote_get( $url);
			if(is_wp_error( $dataResponse )){
				return false;
			}
			$bodydata=wp_remote_retrieve_body( $dataResponse );
			$decodedData=json_decode($bodydata);

			$countries = [];
			if($decodedData && is_object($decodedData->data)){
				foreach($decodedData->data as $country){
					$countries[] = [
						'origin' => $country->origin,
						'destination' => $country->destination,
						'price' => $country->price,
						'transfers' => $country->transfers,
					];
				}
			}

			wp_send_json_success( $countries, 200 );
		} catch (\Throwable $th) {
			//throw $th;
		}
		
		wp_send_json_error( "Server error", 500 );
	}


	function flyghtShowHtml(){	
 		ob_start( );
     	require_once plugin_dir_path(__FILE__)."partials/ca-travelpayout-public-display.php" ;
	}

	

}
