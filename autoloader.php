<?php
namespace NamespacedPlugin;

include('config/config.php');
include('config/parameters.php');

class Autoloader{

	public $config;

	public function __construct(){
		$this->config = new config\Config();
		$this->loader($this->config->getParam('bootstrap'));
		$this->loader($this->config->getParam('classes'));
	}

	public function loader($classArray){
		
		if(!is_array($classArray)){
			throw new \InvalidArgumentException('$classArray must be of type array() "'.gettype($classArray).'" given.');
		}
		foreach($classArray as $class){

			$file =  ABSPATH . 'wp-content/plugins/'.str_replace('\\','/',$class).'.php';
			if(!file_exists($file)){
				throw new \InvalidArgumentException('Tried to include file "' . $file . '" However it does not exist!');
			}
			
			require_once($file);
		}
	}
}