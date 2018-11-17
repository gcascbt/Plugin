<?php
/**
* @package AlcadddPlugin
*/


namespace Inc\Base; 

use \Inc\Base\BaseController;

class Enqueue extends BaseController{

	public function register(){
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueues' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ) );

	}

	/*
	this link to the alcaddd-	plugin.php by define dir_url before using extends and use on this page
	function enqueue(){
		//equeue all our scripts
		wp_equeue_style('mypluginstyle', PLUGIN_URL . 'assets/mystyle.css' ); // css
		wp_equeue_script('mypluginscript', PLUGIN_URL . 'assets/myscript.js' );
		wp_equeue_style('adminpluginstyle', PLUGIN_URL . 'assets/adminstyle.css' ); // css
		wp_equeue_script('adminpluginscript', PLUGIN_URL . 'assets/adminscript.js' ); //js
		// wp_equeue_style('mypluginstyle', get_template_directory_uri('/assets/mystyle.css', __FILE__)); //css This is for building templete
	}*/
	function enqueue(){
		//equeue all our scripts
		wp_enqueue_style( 'mypluginstyle', $this->plugin_url . 'assets/mystyle.css' ); // css
		wp_enqueue_script( 'mypluginscript', $this->plugin_url . 'assets/myscript.js' ); //js
		// wp_equeue_style('mypluginstyle', get_template_directory_uri('/assets/mystyle.css', __FILE__)); //css This is for building templete
	}
	 function enqueues(){
		//equeue all our scripts
		wp_enqueue_style( 'adminpluginstyle', $this->plugin_url . 'assets/adminstyle.css' ); // css
		wp_enqueue_script( 'adminpluginscript', $this->plugin_url . 'assets/adminscript.js' ); //js
		// wp_equeue_style('mypluginstyle', get_template_directory_uri('/assets/mystyle.css', __FILE__)); //css This is for building templete
	} 

}