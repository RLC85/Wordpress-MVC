<?php

namespace NamespacedPlugin\Bootstrap;

class ViewManager{
	
	public function render($filename){
		include ABSPATH .'wp-content/plugins/'.PLUGIN_NAME.'/view/'.$filename.'.php';
	}
}
