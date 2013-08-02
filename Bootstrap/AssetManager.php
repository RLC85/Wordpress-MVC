<?php

namespace NamespacedPlugin\Bootstrap;


class AssetManager{
	public $admin    = array('JS'  => array(),
						     'CSS' => array());

	public $frontEnd = array('JS'  => array(),
						     'CSS' => array());

	public $global   = array('JS'  => array(),
						     'CSS' => array());

	public function __construct(){
		if(is_admin()){
			$this->queJs($this->admin['JS']);
			$this->queCss($this->admin['CSS']);
		}else{
			$this->queJs($this->frontEnd['JS']);
			$this->queCss($this->frontEnd['CSS']);
		}
		$this->queJs($this->global['JS']);
		$this->queCss($this->global['CSS']);
	}

	public function addCss($scope='',$slug='',$args=array()){
		if(in_array($slug, $this->$scope['CSS'])){
			throw new \RuntimeException('The slug "'.$slug.'" is all ready registered in the "'.$scope.'" CSS array.');
		}
		array_push($this->$scope['CSS'], $args);
	}

	public function removeCss($scope,$slug){
		if(array_key_exists($slug, $this->$scope['CSS'])){
			unset($this->$scope['CSS'][$slug]);
		}
	}

	public function addJs($slug,$scope,$args){
		if(in_array($slug, $this->$scope['JS'])){
			throw new \RuntimeException('The slug "'.$slug.'" is all ready registered in the "'.$scope.'" JS array.');
		}
		array_push($this->$scope['JS'], $args);
	}

	public function removeJs($slug){
		if(array_key_exists($slug, $this->$scope['JS'])){
			unset($this->$scope['JS'][$slug]);
		}
	}

	public function queJs($js=array()){
		if(count($js)>0){
			foreach($js as $params){
				wp_register_script( $params['handle'], plugins_url( $params['file'] ), $params['deps'] );
				wp_enqueue_script ( $params['handle'] );
			}
		}
	}

	public function queCss($css=array()){
		if(count($css)>0){
			foreach($css as $params){
				wp_register_style( $params['handle'], plugins_url($params['file'] ));
				wp_enqueue_style ( $params['handle'] );
			}
		}
	}
}