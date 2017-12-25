<?php 
namespace library;

use library\route;
use library\dispatcher;

require 'library/route.php';
require 'library/dispatcher.php';

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