<?php

/**
* @package AlcadddPlugin
*/
/*
Plugin Name: alecaddd Plugin
Plugin URI: http://alcaddd.com/plugin
Description: This is my first attempt on writting a custom Plugin
Version: 1.0.0
Author: Wahab "Push-techn" olaonipekun
Author URI: http://alecaddd.com
License: GPLv2 or later
Text Domain: alecaddd-plugin
*/
/*
This contain policy information 

*/


// if this is called firectly, abort!!!
defined('ABSPATH') or die('Hey, you can\'t access this ');

// Require once the composer autoload
if( file_exists( dirname( __FILE__ ). '/vendor/autoload.php' )){
	require_once dirname( __FILE__ ). '/vendor/autoload.php';
}

/* define CONSTANTS
define( 'PLUGIN_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_URL', plugins_dir_url( __FILE__ ) );
define( 'PLUGIN', plugin_basename(__FILE__) ); */



/**
* The code runs during plugin activation
*/
function plugin_activate(){
	Inc\Base\Activate::activate();
}

register_activation_hook( __FILE__, 'plugin_activate' );

function plugin_deactivate(){
	Inc\Base\Deactivate::deactivate();
}

register_activation_hook( __FILE__, 'plugin_deactivate' );

if( class_exists( 'Inc\\Init' ) ){
	Inc\Init::register_services();
}