<div class="container-fluid">
    <div class="wrap">
<?php 
		// include_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/advance-green-plugin-social-settings.php';	
		// include_once plugin_dir_path( dirname( __FILE__ ) ) . '/admin/partials/advance-green-plugin-social-settings.php';	
        settings_errors(); 
        
        function agp_facebook_link(){
            $facebook = esc_attr(get_option('facebook'));
            echo '<input class="regular-text form-control" type="url" name="facebook" value="'.$facebook.'" placeholder=" "  />';
         }

        function agp_insta_link(){
        $insta = esc_attr(get_option('instagram'));
        echo '<input class="regular-text form-control" type="url" name="instagram" value="'.$insta.'" placeholder=" "  />';
        }

         function agp_linkedin_link(){
         $linkedin = esc_attr(get_option('linkedin'));
         echo '<input class="regular-text form-control" type="url" name="linkedin" value="'.$linkedin.'" placeholder=" "  />';
        }

        function agp_twitter_link(){
        $twitter = esc_attr(get_option('twitter'));
        echo '<input class="regular-text form-control" type="url" name="twitter" value="'.$twitter.'" placeholder=" "  />';
        }
    
        function agp_google_analytics_link(){
        $googleanalytics = get_option('googleanalytics');
        echo '<textarea  class="regular-text form-control" name="googleanalytics" rows="8" >'.$googleanalytics.'</textarea>';
        }
    

        

?>

<form method="post" action="options.php">
    <?php settings_fields('agp-settings-group'); ?>
    <?php do_settings_sections('advanceMarketingOptions'); ?> <!-- name of the page where the section belongs -->
    <?php submit_button('Save options','btn btn-primary') ?>    
</form>

<?php
    
    add_action('wp_head', 'header_code_push');
    function header_code_push(){
        print get_option('googleanalytics');
    }

?>
</div>
</div>
