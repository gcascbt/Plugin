<?php

/**
* @package AlcadddPlugin
*/


namespace Inc\Pages;

use\Inc\Base\BaseController;
use\Inc\Api\SettingsApi;
use\Inc\Api\Callbacks\AdminCallbacks;

class Admin extends BaseController{

	public $settings;
	public $pages = array();
	public $subpages = array();

	function register(){
     $this->settings = new SettingsApi();
     $this->callbacks = new AdminCallbacks();
     $this->setPage();
     $this->setSubPages();
		$this->settings->addPages($this->pages)->withSubPages('Dashboard')->addSubPages($this->subpages)->register();
	$this->setSettings();
	$this->setSections();
	$this->setFields();
	}

	public function setPage(){
		$this->pages = array(
						array(
							'page_title' => 'Gcas Plugin',
							'menu_title' => 'Gcas',
							'capability' => 'manage_options',
							'menu_slug' => 'gcas_plugin',
							'callback' => array( $this->callbacks, 'adminDashboard' ),
							'icon_url' => 'dashicons-store',
							'position' => 110
						)
					);
	} public function setSubPages(){

		$this->subpages = array(
						array(
							'parent_slug' => 'gcas_plugin',
							'page_title' => 'Custom Post Type',
							'menu_title' => 'CPT',
							'capability' => 'manage_options',
							'menu_slug' => 'gcas_cpt',
							'callback' => array( $this->callbacks, 'cptDashboard' )

						),
						array(
							'parent_slug' => 'gcas_plugin',
							'page_title' => 'Forum Post Type',
							'menu_title' => 'Forum',
							'capability' => 'manage_options',
							'menu_slug' => 'gcas_forum',
							'callback' => function(){ echo '<h1>Forum Post Type Area</h1>'; }
						),
						array(
							'parent_slug' => 'gcas_plugin',
							'page_title' => 'Activity Post Type',
							'menu_title' => 'Activity',
							'capability' => 'manage_options',
							'menu_slug' => 'gcas_activity',
							'callback' => function(){ echo '<h1>Activity Post Type Area</h1>'; }
						)
					);
	}

	public function setSettings(){

		$arg  = array(
		array(
			'option_group' => 'gcas_options_group',
			'option_name' => 'gcas_text_example',
			'callback' => array($this->callback, 'gcasOptionsGroup' )
		) );

		$this->settings->setSettings($arg);
	}

	public function setSections(){

		$arg  = array(
		array(
			'id' => 'gcas_admin_index',
			'title' => 'Settings',
			'callback' => array($this->callback, 'gcasAdminSection' ),
			'page' => 'gcas_plugin'
		) );

		$this->settings->setSections($arg);
	}

	public function setFeilds(){

		$arg  = array(
		array(
			'id' => 'gcas_text_example', // the option_name array of setSettings() as to be the same name with id array of setField() 
			'title' => 'Gcas Text Example',
			'callback' => array($this->callback, 'gcasTextExample' ),
			'page' => 'gcas_plugin',
			'section' => 'gcas_admin_index', // the id array of setSections() as to be the same name with id array of setFields() 
			'arg' => array(
				'label_for' => 'gcas_text_example',
				'class' => 'example-class'
			)
		) );

		$this->settings->setFields($arg);
	}


}

















// class Admin extends BaseController{

// 	function register(){
// 		add_action( 'admin_menu', array($this, 'add_admin_pages' ) );
// 	}
	// function add_admin_pages(){
	// 	 dashboad menu implementation
	// 	 the first '' represent your page function while your second '' represent your icon deleration in form of enqueue. dashicons-store is from wordpress icon template.
	// 	add_menu_page($page_title, menu_title, capability, menu_slug, '', '', null); 
	// 	add_menu_page( 'Gcas Plugin', 'Gcas', 'manage_options', 'gcas_plugin', array($this, 'admin_content_index'), 'dashicons-store', 110 );
	// }
	// function admin_content_index(){


	// 	/* require template */
		
	// 	this link to the alcaddd-plugin.php by define dir_path before using extends and use on this page
	// 	require_once PLUGIN . 'templates/admin.php'; 
	// 	require_once $this->plugin_path . 'templates/admin.php';
		
	// }

//}