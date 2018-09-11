<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       administrator
 * @since      1.0.0
 *
 * @package    Advance_Green_Plugin
 * @subpackage Advance_Green_Plugin/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Advance_Green_Plugin
 * @subpackage Advance_Green_Plugin/admin
 * @author     Kshitij Bhatt <kshitij@aurovilleconsulting.com>
 */
class Advance_Green_Plugin_Admin {

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

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advance_Green_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advance_Green_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/advance-green-plugin-admin.min.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Advance_Green_Plugin_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Advance_Green_Plugin_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/advance-green-plugin-admin.min.js', array( 'jquery' ), $this->version, true );

	}
	public function display_admin_page(){
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/advance-green-plugin-admin-display.php';
	}

	public function agp_menu_section() {
		add_menu_page(
			'Advance Green Options','AGP Options','manage_options','advanceGreenOptions',array($this, 'homepageSlider' ),'dashicons-admin-generic','45.0'
			);
		//Generate Sub menu pages
		add_submenu_page( 
			'advanceGreenOptions','Homepage Slider','Homepage Slider','manage_options',	'advanceGreenOptions',array($this, 'homepageSlider' )
		);
		add_submenu_page(
			'advanceGreenOptions','General Settings','General Settings','manage_options','advanceGeneralSettings',array($this,'advanceGeneralSettings')
		);
		add_submenu_page(
			'advanceGreenOptions','Marketing Settings','Marketing Settings','manage_options','advanceMarketingOptions',array($this,'showMarketingOptions')
		);
		register_setting('agp-settings-group', 'facebook'
		);
		register_setting('agp-settings-group', 'twitter'
		);
		register_setting('agp-settings-group', 'linkedin'
		);
		register_setting('agp-settings-group', 'instagram'
		);
		register_setting('agp-settings-group', 'googleanalytics'
		);
		
			add_settings_section('agp-social-options', 'Social Links' , '', 'advanceMarketingOptions'
			);
			
				add_settings_field('Facebook-Link', 'Facebook', 'agp_facebook_link', 'advanceMarketingOptions', 'agp-social-options'
				);
				add_settings_field('Twitter-Link', 'Twitter', 'agp_twitter_link', 'advanceMarketingOptions', 'agp-social-options'
				);
				add_settings_field('Instagram-Link', 'Instagram', 'agp_insta_link', 'advanceMarketingOptions', 'agp-social-options'
				);
				add_settings_field('LinkedIn-Link', 'LinkedIn', 'agp_linkedin_link', 'advanceMarketingOptions', 'agp-social-options'
				);
			
				add_settings_field( 'Google_Analytics-Link', 'Analytics', 'agp_google_analytics_link','advanceMarketingOptions', 'agp-social-options' 
				);
			
	}

	public function homepageSlider(){
		
		require_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/advance-green-plugin-header-slider.php';	
	
	}

	public function showMarketingOptions(){
		
		include_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/advance-green-plugin-social-settings.php';
	
	}
	public function advanceGeneralSettings(){

	}

		
}
