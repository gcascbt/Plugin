<?php

/**
* @package AlcadddPlugin
*/
namespace Inc\Api;

class SettingsApi{

	public $admin_pages = array();
	public $admin_subpages = array();
	public $settings = array();
	public $sections = array();
	public $field = array();



	public function register(){

		if( !empty( $this->admin_pages ) ){
			add_action( 'admin_menu', array( $this, 'addAdminMenu' ) );
		}
		if( !empty( $this->admin_pages ) ){
			add_action( 'admin_init', array( $this, 'registerCustomField' ) );
		}
		RegisterCustomField
	}


	public function addPages(array $pages){

		$this->admin_pages = $pages;


		return $this;
	}

	public function withSubPages(String $title = null){
		if( empty( $this->admin_pages ) ){
			return $this;
		}

		$admin_page = $this->admin_pages[0];

		$subpage = array(
						array(
							'parent_slug' => $admin_page['menu_slug'],
							'page_title' => $admin_page['page_title'],
							'menu_title' => ($title) ? $title : $admin_page['menu_title'],
							'capability' => $admin_page['capability'],
							'menu_slug' => $admin_page['menu_slug'],
							'callback' => $admin_page['callback']
						)
					);
		$this->admin_subpages = $subpage;
		return $this;
	}
	public function addSubPages( array $pages ){
		$this->admin_subpages = array_merge( $this->admin_subpages, $pages );
		return $this;
	}

	public function addAdminMenu(){
		foreach ($this->admin_pages as $page) {
			add_menu_page( $page['page_title'], $page['menu_title'], $page['capability'], $page['menu_slug'], $page['callback'], $page['icon_url'], $page['position']);
		}
		foreach ($this->admin_subpages as $pages) {
			add_submenu_page( $pages['parent_slug'], $pages['page_title'], $pages['menu_title'], $pages['capability'], $pages['menu_slug'], $pages['callback'] );
		}
		
	}

	public function setSettings(array $settings){

			$this->settings = $settings

			return $this;
	}
	public function setSections(array $sections){

			$this->sections = $sections

			return $this;
	}
	public function setFields(array $fields){

			$this->fields = $fields

			return $this;
		}






	public function registerCustomField(){

		// register setting
		foreach ($this->settings as $setting) {
			register_setting( $setting["option_group"], $setting["option_name"], (isset( $setting["callback"] ) ? $setting["callback"] : '') );
		}

		// add section
		foreach ($this->sections as $section) {
			add_settings_section( $section["id"], $section["title"], ( issset( $section["callback"] ) ? $section["callback"] : '' ) , $section["page"] );
		}

		// add settings field
		//add_sittings_field( $id, $title, $callback, $page, 'default', array( '' ) );
		foreach ($this->fields as $field) {
			add_sittings_field( $field["id"], $field["title"], ( issset( $field["callback"] ) ? $field["callback"] : '' ), $field["page"], $field["section"], ( issset( $field["args"] ) ? $field["args"] : '' ) );
		}
	}


}