<?php 
        add_menu_page(
			'Advance Green Options',
			'AGP Options',
			'manage_options',
			'advanceGreenOptions',
			'showOptions',
			'dashicons-admin-generic',
			'45.0'
			
		);
		//Generate Sub menu pages
		add_submenu_page( 
			'advanceGreenOptions',
			'Homepage Slider',
			'Homepage Slider',
			'manage_options', 
			'advanceGreenOptions', 
			 'showOptions' 
		);
		add_submenu_page(
			'advanceGreenOptions', 
			'Marketing Settings', 
			'Marketing Settings', 
			'manage_options', 
			'advanceMarketingOptions',
            'showMarketingOptions');


//Activate custom settings
add_action( 'admin_init', 'agp_custom_settings' );

function agp_home_slider_images(){
	
}

function agp_custom_settings(){


	register_setting('agp-settings-group', 'facebook');
	register_setting('agp-settings-group', 'twitter');
	register_setting('agp-settings-group', 'linkedin');
	register_setting('agp-settings-group', 'instagram');
	register_setting('agp-settings-group', 'googleanalytics');

	add_settings_section('agp-social-options', 'Social Links' , 'agp_social_options', 'advanceMarketingOptions');
	add_settings_field('Facebook-Link', 'Facebook', 'agp_facebook_link', 'advanceMarketingOptions', 'agp-social-options');
	add_settings_field('Twitter-Link', 'Twitter', 'agp_twitter_link', 'advanceMarketingOptions', 'agp-social-options');
	add_settings_field('Instagram-Link', 'Instagram', 'agp_insta_link', 'advanceMarketingOptions', 'agp-social-options');
	add_settings_field('LinkedIn-Link', 'LinkedIn', 'agp_linkedin_link', 'advanceMarketingOptions', 'agp-social-options');
	
	add_settings_field( 'Google_Analytics-Link', 'Analytics', 'agp_google_analytics_link','advanceMarketingOptions', 'agp-social-options' );

}

function showOptions(){
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'Slider/header-form.php';
}

function showMarketingOptions() {
	//generation of our admin page
	require_once plugin_dir_path( dirname( __FILE__ ) ) . 'settings/social-form.php';
}
            
