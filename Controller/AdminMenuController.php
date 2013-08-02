<?php

namespace  NamespacedPlugin\Controller;

use NamespacedPlugin\Bootstrap\ViewManager;
use NamespacedPlugin\Model\MenuModel;
use NamespacedPlugin\Bootstrap\aController;

class AdminMenuController extends aController{
	public $mainMenus = array();
	public function __construct(){
		echo 'I am here';
		$this->showIndex();
	}

	public function addGenericMenu(){
		$menu = new \NamespacedPlugin\Model\MenuModel();
		$menu->name = 'Generic Menu';
		$menu->pageTitle = 'Generic Menu';
		$menu->capabilities = 'manage_options';
		$menu->slug = 'generic-menu';
		$menu->function = array('NamespacedPlugin\Controller\AdminMenuController','showIndex');
		$menu->addMainMenu();
	}

	public function showIndex(){
		
	}
}
