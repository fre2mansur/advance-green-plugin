<?php

/**
 * Fired during plugin activation
 *
 * @link       administrator
 * @since      1.0.0
 *
 * @package    Advance_Green_Plugin
 * @subpackage Advance_Green_Plugin/includes
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Advance_Green_Plugin
 * @subpackage Advance_Green_Plugin/includes
 * @author     Kshitij Bhatt <kshitij@aurovilleconsulting.com>
 */
class Advance_Green_Plugin_Activator {

	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0'
	 */



	public function activate() {

		global $wpdb;
		$charset_collate = $wpdb->get_charset_collate();
		$this->create_table($wpdb, $charset_collate);

		// require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
		// global $wpdb;

		// if(cound($wpdb->get_var("show tables like'".$this->tables->Advance_Green_Plugin_Table_Images()."'")) == 0 ){
		// 	$sqlQuery = '
			
		// 	CREATE TABLE `'.$this->tables->Advance_Green_Plugin_Table_Images(). '` (
		// 		`id` bigint(20) NOT NULL AUTO_INCREMENT,
		// 		`Title` text,
		// 		`Image` longtext,
		// 		PRIMARY KEY (`id`)
		// 	   ) ENGINE=InnoDB DEFAULT CHARSET=latin1';
		// 	dbDelta( $sqlQuery);
		// }
	}
		private function create_table($wpdb, $charset_collate){
			$table_name = "{$wpdb->base_prefix}advance_green_plugin_gallery";
			$check_table_name = $wpdb->get_var("SHOW TABLES LIKE '$table_name'");
			if ( $check_table_name != $table_name ) {
			$sql = "CREATE TABLE $table_name (
				id int(11) NOT NULL AUTO_INCREMENT,
				title text(255) DEFAULT NULL,
				src longtext DEFAULT NULL,
				PRIMARY KEY (id)
			) $charset_collate;";
			require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
			dbDelta( $sql );
			}
		}
}
