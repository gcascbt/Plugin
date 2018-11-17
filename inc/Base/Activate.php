<?php

/**
* @package AlcadddPlugin
*/
namespace Inc\Base;

class Activate{

	public static function activate(){
		// generated a CPT
		
		// flush rewrite rules
		flush_rewrite_rules();
	}
}