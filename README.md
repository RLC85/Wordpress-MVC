Wordpress-MVC
==============

A Namespaced MVC base to allow for more maintainable Wordpress Plugins
--------------

Objective
==============

- To create a reusable library to help create Wordpress plugins
- To allow for a more maintainable code platform
- To make use of current PHP 5.3+ in a stable easy to use framework

Restrictions
==============

One plugin per WordPress installation
-------------------------------------

The reason that you can only have one installation per WordPress intallation is due to the Constants that point to the plugins directory. You can override this restriction by changing the constant names in the config/config.php


Installation
============

To check out this plugin all you have to do is check it out and place the directory in the plugins directory.

Configuration
=============
Although you can use this lib as is without any configuration if you are wanting to change the root directory name. you will want to change all of the namespaces and change the PLUGIN_NAME constant in the config/config.php

If you add a new sub-directory to any of the folders just create a class with the same name as the directory and add a new Namespace/sub/directory() to the array in the autoloader.php file.


Example Usage
=============

Below is an example of how easy it is to create a new plugin


	//This class is located in the Controller folder

	<?php
		namespace NamespacedPlugin/Controller;

		class HelloWorld{

			public function hello(){
				echo "Hello, World";
			}
		}

	//This class is the base Plugin class

	<?php
		namespace NamespacedPlugin;
		use NamespacedPlugin/Controller/HelloWorld;

		class Plugin{

			public function __construct(){
				$hw = new HelloWorld();
				$hw->hello();
			}
		}

		$plugin = new Plugin();

And thats all there is to it for now.

Future Objectives
=================

-Implement dynamic Shortcodes, Options, Actions, and Asset managers as these *for me at least* are always the most tedious 