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
	private $travel;
	public $currentIp;
	public $currentCurrencyCode;
	public $originLocation;
	public $originCityIATA;

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
		
		$ipObject = wp_remote_get( 'https://api.ipify.org' );
		$ipAddress = wp_remote_retrieve_body($ipObject);

		if($ipAddress){
			$this->currentIp = $ipAddress;

			$currency = wp_remote_get( "https://ipapi.co/$ipAddress/currency/" );
			$currencyCode = wp_remote_retrieve_body($currency);	
			$this->currentCurrencyCode = $currencyCode;

			$originCity=$this->userLocatinByIP();
			if ($originCity) {
				$originCityName = $originCity->name;
				$originCityiatacode = $originCity->name;
				$this->originLocation =$originCityName;
				$this->originCityIATA =$originCityiatacode;
			}

		}


	
	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		wp_enqueue_style( 'card__style', plugin_dir_url( __FILE__ ) . 'css/ca-card-section.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'vue-datepicker', 'https://unpkg.com/@vuepic/vue-datepicker@latest/dist/main.css', array(), $this->version, 'all' );
		
		wp_enqueue_style( 'casearch__result', plugin_dir_url( __FILE__ ) . 'css/ca-search-result.css', array(), $this->version, 'all' );
		
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/ca-travelpayout-public.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'ca_breakpoint', plugin_dir_url( __FILE__ ) . 'css/breakpoints.css', array(), $this->version, 'all' );
		wp_register_style( 'ca_breakpoint', plugin_dir_url( __FILE__ ) . 'css/breakpoints.css', array(), $this->version, 'all');
		
		
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {
		wp_enqueue_script( 'vueGlobal', plugin_dir_url( __FILE__ ) . 'js/vue.global.js', array(  ), $this->version, false );
		wp_enqueue_script( 'uuidv4', plugin_dir_url( __FILE__ ) . 'js/uuidv4.js', array(  ), $this->version, false );
		wp_enqueue_script( 'cataxios', 'https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.2/axios.min.js', array(  ), $this->version, false );
		wp_enqueue_script( 'vue-datepicker', 'https://unpkg.com/@vuepic/vue-datepicker@latest', array(  ), $this->version, false );
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/ca-travelpayout-public.js', array( 'jquery','vueGlobal', 'cataxios','vue-datepicker' ), $this->version, true );
		wp_localize_script( $this->plugin_name, 'catp_fragments', array(
			'ajaxurl'                => admin_url("admin-ajax.php"),
			'currentCurrency'        => $this->currentCurrencyCode,
			'originLocation'         =>$this->originLocation,
			'originLocationIatacode' =>$this->originCityIATA,
			'redirectLink'           =>get_option('catpredirectURL'),
		) );
	}
     
	function userLocatinByIP(){
		$ipObject = wp_remote_get( 'https://api.ipify.org?format=json' );
		$ipObject = wp_remote_retrieve_body($ipObject);
		$ipAddress = json_decode($ipObject)->ip;
        $locationURL = 'http://www.travelpayouts.com/whereami?locale=en&ip='.$ipAddress;
		$countryData=wp_remote_get( $locationURL);
		if(is_wp_error($countryData)){
			return false;
		}
		$mainData=wp_remote_retrieve_body($countryData);
		$useralocationdata=json_decode($mainData);

		return $useralocationdata;
	}
	// retrive country data
	function cat_countries(){
		try {
			$countryUrl='http://api.travelpayouts.com/data/en/countries.json';
			$countryResponse=wp_remote_get( $countryUrl);
			if(is_wp_error( $countryResponse )){
				return false;
			}
			$countryBody=wp_remote_retrieve_body( $countryResponse );
			$countrydata=json_decode($countryBody);
			if($countrydata&&is_array($countrydata)){
				$allCountry=[];
				foreach($countrydata as $country){
					$allCountry[]=[
						'code'  =>  $country->code,
						'name'  =>  $country->name,						
						'currency'  =>  $country->currency
					];
				}
			}

			return $allCountry;
			wp_send_json_success( $allCountry, 200 );

		} catch (\Throwable $th) {
			
		}
		wp_send_json_error( "Server error", 500 );
	}

	function cat_allCittyes(){
		// Define the path for the temporary file
		$tempFilePath = __DIR__. '/temp/cities.json';

		// Read and process the downloaded JSON file
		$cityData = file_get_contents($tempFilePath);

		// Decode the JSON data
		$cities = json_decode($cityData);

		// Check for JSON decoding errors
		if (json_last_error() !== JSON_ERROR_NONE) {
			echo 'JSON decoding error: ' . json_last_error_msg();
		} else {
			// Process the data as needed
			$allCities = [];
			foreach ($cities as $city) {
				$allCities[] = [
					'country_code' => $city->country_code,
					'city_code'    => $city->code,
					'cityName'     => $city->name
				];
			}

			// Print or use the processed data
			wp_send_json_success( $allCities, 200 );
		}

		// Optionally, you can delete the temporary file
		// unlink($tempFilePath);
		wp_send_json_error( "Server error", 500 );
	}

	function cat_getPricess(){
		try {
			$currencys=$_GET['currency'];
					
			$originS=(array)$this->userLocatinByIP();
			$origin = isset($_GET['originCode']) ? $_GET['originCode'] : $originS['iata'];
			$currentDate = date('Y-m-d');
			$currency = (isset($currencys) && !empty($currencys)) ? $currencys : $this->currentCurrencyCode;

			
			$priceUrl=' http://map.aviasales.com/prices.json?origin_iata='.$origin.'&currency='.$currency;
			$priceOBJ= wp_remote_get($priceUrl);
			if(is_wp_error( $priceOBJ)){
				return false;
			}
			$priceBody= wp_remote_retrieve_body( $priceOBJ);
			$priceDecode=json_decode($priceBody);
			if($priceDecode&&is_array($priceDecode)){
				$singlePrice=[];
				foreach ($priceDecode as $price) {
					$singlePrice[]=[
						'value' => number_format($price->value, 0),
						'origin' => $price->origin,
						'number_of_changes' => $price->number_of_changes,
						'destination' => $price->destination,
						'return_date' => $price->return_date,
						'depart_date' => $price->depart_date,
						'airline' => $price->airline,
						'trip_class' => $price->trip_class
					];
				}
				wp_send_json_success( $singlePrice, 200 );
			}
		} catch (\Throwable $th) {
			//throw $th;
		}

		wp_send_json_error( "Server error", 500 );
	}

	// function popularCountries(){
	// 	try {
			
	// 		$apiCode=get_option('catpapiCode');
	// 		$data=(array)$this->userLocatinByIP();
	// 		$iata=$data['iata'];
	// 		$url= 'http://api.travelpayouts.com/v1/city-directions?origin='.$iata.'&currency=BDT&token='.$apiCode;
	// 		$dataResponse=wp_remote_get( $url);
	// 		if(is_wp_error( $dataResponse )){
	// 			return false;
	// 		}
	// 		$bodydata=wp_remote_retrieve_body( $dataResponse );
	// 		$decodedData=json_decode($bodydata);

	// 		$countries = [];
	// 		if($decodedData && is_object($decodedData->data)){
	// 			foreach($decodedData->data as $country){
	// 				$countries[] = [
	// 					'origin' => $country->origin,
	// 					'destination' => $country->destination,
	// 					'price' => $country->price,
	// 					'transfers' => $country->transfers,
	// 				];
	// 			}
	// 		}

	// 		wp_send_json_success( $countries, 200 );
	// 	} catch (\Throwable $th) {
	// 		//throw $th;
	// 	}
		
	// 	wp_send_json_error( "Server error", 500 );
	// }

	function get_flight_ticket_fromCity() {

		try {
		
			if (!isset($_GET['singleTicketData'])) {
				return false;
			}

			$origin = $_GET['singleTicketData']['origin'];
			$destination = $_GET['singleTicketData']['destination'];
			$depart_date = date("Y-m", strtotime($_GET['singleTicketData']['depart_date']));
			$return_date = date("Y-m", strtotime($_GET['singleTicketData']['return_date']));
			$apiToken = get_option('catpapiCode');
			$apiUrl = 'https://api.travelpayouts.com/aviasales/v3/prices_for_dates?origin=' . $origin . '&destination=' . $destination . '&departure_at=' . $depart_date . '&return_at=' . $return_date . '&unique=false&sorting=price&direct=false&currency=BDT&limit=30&page=1&one_way=false&token=' . $apiToken . '';
			$response = wp_remote_get($apiUrl);
			$bodydata = wp_remote_retrieve_body( $response );

			if (is_wp_error($bodydata)) {
				return false;
			}

			$response = json_decode($bodydata);

			if ($response === null) {
				return false;
			}

			wp_send_json( $response, 200 );

		} catch(\Throwable $th) {
			// throw $th;
		}
	}

	function get_travel_prices() {
		try {

			if(!isset($_GET['apiParam'])){
				return false;
			}

			$apiKey = get_option('catpapiCode');
			$origin = $_GET['apiParam']['origin'];
			$destination = $_GET['apiParam']['destination'];
			$depure = $_GET['apiParam']['depure'];
			$return = (isset($_GET['apiParam']['return'])?$_GET['apiParam']['return']:'');
			$oneW=isset($_GET['apiParam']['oneway'])?$_GET['apiParam']['oneway']:'';
			$oneWay=(!empty($oneW)?$oneW:true);

			$curr=isset($_GET ['apiParam']['currency'])?$_GET ['apiParam']['currency']:'';
			$currency =(!empty($curr)?$curr:$this->currentCurrencyCode);

			$url = "https://api.travelpayouts.com/aviasales/v3/prices_for_dates?origin=$origin&destination=$destination&departure_at=$depure&return_at=$return&unique=false&sorting=price&direct=false&currency=$currency&limit=100&page=3&one_way=$oneWay&token=$apiKey";

			// Make the API request
			$response = wp_remote_get($url);

			// Check if the request was successful
			if (is_wp_error($response)) {
				return 'Error fetching data';
			}

			// Decode the JSON response
			$data = json_decode(wp_remote_retrieve_body($response), true);

			// Check if decoding was successful
			if ($data === null) {
				return 'Error decoding JSON';
			}
			// Output the data
			wp_send_json( $data, 200 );
		} catch (\Throwable $th) {
			//throw $th;
		}
	}


	function flyghtShowHtml(){	
		wp_enqueue_style( 'ca_breakpoint');
 		ob_start( );
		if(isset($_GET['ticket'])&&!empty($_GET['ticket'])){
           echo "hello ";
		}else{
     		require_once plugin_dir_path(__FILE__)."partials/ca-travelpayout-public-display.php" ;
		}
		return ob_get_clean();
	}

	

}