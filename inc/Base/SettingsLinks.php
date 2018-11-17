<?php

/**
* @package AlcadddPlugin
*/


namespace Inc\Base;

use \Inc\Base\BaseController;



class SettingsLinks extends BaseController{

	 // this Methed

	/* protected $plugin;
	public function __constuct(){
		$this->pligin = PLUGIN;
	} */
	public function register(){
		/*
	this link to the alcaddd-plugin.php by define dir_url before using extends, qouting out _construct, protected $plugin and use on this page
		add_filter("plugin_action_links_$this->plugin", array($this, 'settings_links' )); */
		add_filter( "plugin_action_links_$this->plugin", array( $this, 'settings_link' ) );
	}

	/* or this Methed
	public function register(){
		add_filter("plugin_action_links" . PLUGIN, array($this, 'settings_links' ));
	}
	*/

	public function settings_link( $links ){
		$settings_link = '<a href="admin.php?page=gcas_plugin">Settings</a>';
		array_push( $links, $settings_link );
		return $links;
	}
}