<?php

namespace NamespacedPlugin\Model;
use NamespacedPlugin\Bootstrap\aModel;

class MenuModel extends aModel{
	public $name;
	public $pageTitle;
	public $capabilities;
	public $slug;
	public $function;

	public function addMainMenu(){
		add_menu_page( $this->name, $this->pageTitle, $this->capabilities, $this->slug, $this->function );
	}

	public function addSubMenu(){

	}
}