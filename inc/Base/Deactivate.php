<?php

/**
* @package AlcadddPlugin
*/

namespace Inc\Base;

class Deactivate{

	public static function deactivate(){
		// generated a CPT
		
		// flush rewrite rules
		flush_rewrite_rules();
	}
}