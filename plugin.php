<?php


/**
 * Plugin Name: Wordpress Namespace MVC
 * Plugin URI: 
 * Description: 
 * Author: Richard Christensen <richard.christensen@signaturesoftwareinc.com>
 * Version: 1.0
 * Author URI: www.signaturesoftwareinc.com
 *
 * Class Plugin
 */
namespace NamespacedPlugin;

 include ('autoloader.php');

use NamespacedPlugin\Controller\MainController;

 class Plugin{

 	public function __construct(){
 		$autoloader = new Autoloader();
 		add_action('admin_menu',array('NamespacedPlugin\Controller\AdminMenuController','addGenericMenu'));
 	}
 }

 $plugin = new Plugin();