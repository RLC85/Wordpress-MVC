<?php

namespace NamespacedPlugin\Bootstrap;


class ActionManager{
	public $admin    = array();

	public $frontEnd = array();

	public $global   = array();

	public function __construct($adminActions = array(),$frontEndActions=array(),$globalActions=array()){
		$this->admin = $adminActions;
		$this->frontEnd = $frontEndActions;
		$this->global = $globalActions;
	}

	public function addAction($slug='',$scope='',$args){
		if(!array_key_exists($slug, $this->$scope)){
			array_push($args, $this->$scope);
		}
	}

	public function removeAction($slug,$scope){
		if(array_key_exists($slug, $this->$scope)){
			unset($this->$scope[$slug]);
		}
	}

	public function addActions($actions=array()){
		if(count($actions)>0){
			foreach($actionArray as $function => $params){
				if( $params['class'] == 'this' ){
					add_action( $params['action'], array( $this, $function ) );
				}else{
					add_action( $params['action'], array( $parameters['class'], $function ) );
				}
			}
		}
	}
}