<?php
namespace NamespacedPlugin;
include('config/config.php');

spl_autoload_register(__NAMESPACE__.'\\loader');

function loader($cls){
	$cls = ltrim($cls, '\\');
    if(strpos($cls, __NAMESPACE__) !== 0)
        return;

    $cls = str_replace(__NAMESPACE__, '', $cls);

    $path = PLUGIN_PATH_PATH . 
        str_replace('\\', DIRECTORY_SEPARATOR, $cls) . '.php';

    require_once($path);
}

$loader = array( new Bootstrap\Bootstrap(),
				 new Controller\Controller(),
				 new Model\Model(),
				 new Assets\Assets(),
				 new lib\Lib());