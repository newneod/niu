<?php 
namespace core\framework;

use core\framework\route;
use core\framework\dispatcher;

require 'core/framework/route.php';
require 'core/framework/dispatcher.php';
require 'core/framework/core.php';

class init
{
	public static function run()
	{
		//通过路由获取要执行的Module/Controller/Action
		$objRoute = new route();
		$arrRoute = $objRoute->getCAddressByUrl();

		//分发执行
		$objDispatcher = new dispatcher();
		$objDispatcher->dispatche( $arrRoute );
	}

}

?>