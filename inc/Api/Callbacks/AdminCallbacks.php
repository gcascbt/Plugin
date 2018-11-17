<?php

/**
* @package AlcadddPlugin
*/


namespace Inc\Api\Callbacks;

use Inc\Base\BaseController;

class AdminCallbacks extends BaseController{

	public function adminDashboard(){
		require_once( "$this->plugin_path/templates/admin.php" );
	}
	public function cptDashboard(){
		require_once( "$this->plugin_path/templates/cpt.php" );
	}

	public function gcasOptionsGroup($input){

		return $input;


	}
	public function gcasAdminSection(){

		echo 'Check this beautiful section';
	}

	public function gcasTextExample(){

// Note: field name should be the same with the id in setField() in Admin.php page
		$value = esc_attr( get_option( 'gcas_text_example' ) );
		echo '<input type="text" class="" name="gcas_text_example" value=" ' . $value . ' " placeholder="Write something here">'
	}
}