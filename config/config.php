<?php

namespace NamespacedPlugin\config;



define('PLUGIN_NAME','NamespacedPlugin');

class Config{

	public $bootstrap = array( 'NamespacedPlugin\Bootstrap\ViewManager',
							   'NamespacedPlugin\Bootstrap\aController',
							   'NamespacedPlugin\Bootstrap\aModel',
							   'NamespacedPlugin\Bootstrap\AssetManager',
							   'NamespacedPlugin\Bootstrap\ActionManager',
							   'NamespacedPlugin\Bootstrap\OptionManager');

	public $classes =   array(	'NamespacedPlugin\Model\MenuModel',
								'NamespacedPlugin\Controller\AdminMenuController',
							   );

	public function getParam($name=''){
		if($name === ''){
			throw new \InvalidArgumentException('Name must be a non empty string. "'.$name.'" given.');
		}
		if(!$this->$name){
			throw new \InvalidArgumentException('Name must be a valid option name "'.$name.'" given.');
		}

		return $this->$name;
	}
}