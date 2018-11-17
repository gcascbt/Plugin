<?php

/**
* @package AlcadddPlugin
*/



namespace Inc;


final class Init{

	/** 
	* Store all the classes inside an array
	* 	@return array full list of classes
	*/
	public static function get_services(){
		// return [ ];
		return [
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\SettingsLinks::class 
		];
	}

	/** 
	* Loop through the classes, initialize them,
	*  and call the register() methed if it exists
	* @return
	*/
	public static function  register_services(){

		foreach( self::get_services() as $class ){
			$service = self::instantiate( $class );
			if(method_exists( $service, 'register' )){
				$service->register();
			}
		}
	}

	/** 
	* Initialize the class
	*  @param class $class     class from the services array
	* @return classs instance    new instance of the class.
	*/

	private static function instantiate( $class ){
		$service = new $class();
		return $service;
	}
}



/*	use Inc\Base\Activate;
	use Inc\Base\Deactivate;
	use Inc\Pages\Admin;

if( !class_exists( 'AlecadddPlugin' )){
class AlecadddPlugin
{
	plubic $plugin;
	

	function __construct(){

		$this->create_post_type();

		$this->plugin = plugin_basename(__FILE__);	
	}
	function register() {
		add_action('admin_enqueue_scripts', array($this, 'enqueue'));
		/* this visible and work for front end view styling
		add_action('wp_enqueue_scripts', array($this, 'enqueue')); */
/*		add_action('admin_enqueue_scripts', array($this, 'add_admin_pages' ));


		/*
		...This part works for settings in plugin part

		add_filter($tag, 4function_to_add, 10, 1); or 
		add_filter('plugin_action_link_NAME-OF-MY-PLUGiN', array($this, 'settings_links') );*/
/*		add_filter("plugin_action_links_$this->plugin", array($this, 'settings_link'));
	}
	// ...This part works for settings in plugin part 

	plubic function settings_link( $links ){
		$settings_link ='<a href="admin.php?page=gcas_plugin">Settings</a>';
		array_puch( $links, $settings_link );
		return $links;
	}
	function create_post_type(){
		add_action('init', array($this, 'custom_post_type'));
	}
	function add_admin_pages(){
		/* dashboad menu implementation
		 the first '' represent your page function while your second '' represent your icon deleration in form of enqueue. dashicons-store is from wordpress icon template.
		add_menu_page($page_title, menu_title, capacity, menu_slug, '', '', null); */
/*		add_menu_page('Alecaddd plugin', 'Gcas', 'manage_options', 'gcas_plugin', array($this, 'admin_content_index'), 'dashicons-store', '110');
	}
	function admin_content_index(){
		/* require template
		require_once plugin_dir_path( __FILE__ ) . 'templates/admin.php'; */
/*		AdminPages->
	}
	
	
	function uninstall(){
		// delete CPT
	}
	function custom_post_type() {
		 ( 'book', ['public'=> true, 'label' => 'Book'] );
	}

	function enqueue(){
		//enqueue all our scripts
		wp_enqueue_style('mypluginstyle', plugins_url('/assets/mystyle.css', __FILE__)); // css
		wp_enqueue_script('mypluginscript', plugins_url('/assets/myscript.js', __FILE__)); //js
		// wp_enqueue_style('mypluginstyle', get_template_directory_uri('/assets/mystyle.css', __FILE__)); //css This is for building templete
		<script type='text/javascript' src='<?php echo get_template_directory_uri() ?>/assets/js/particles.min.js?ver=3.7.4'> </script>
	}
	function activate(){
		// require_once plugin_dir_path( __FILE__ ) . 'inc/alecaddd-plugin-active.php';
		Deactivate::deactivate();
	}
	function deactivate(){
		//require_once plugin_dir_path( __FILE__ ) . 'inc/alecaddd-plugin-deactive.php';
		Activate::activate();
	}
}


		$alecadddPlugin = new AlecadddPlugin();
		$alecadddPlugin->register();





//activation
	register_activation_hook( __FILE__, array( $alecadddPlugin, 'activate') );

	//deactivation
	register_deactivation_hook( __FILE__, array( $alecadddPlugin, 'deactivate') );

	//uninstall
		//this is when you want delete
	register_uninstall_hook( __FILE__, array( $alecadddPlugin, 'uninstall' ) ); // when using this you must use static on you function under your class otherwise it's will trigger error.
}
*/