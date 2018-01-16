<?php 
namespace core\framework;

use core\framework\route;
use core\framework\dispatcher;

require_once 'core/framework/route.php';
require_once 'core/framework/dispatcher.php';
require_once 'core/framework/core.php';

class init
{
    /**
     * cgi模式启动方法
     */
	public static function run()
	{
	    //实例化对象时，自动引用该类文件
	    $objCore = new core();
	    $objCore->autoloadClass();

		//通过路由获取要执行的Module/Controller/Action
		$objRoute = new route();
		$arrRoute = $objRoute->getCAddressByUrl();

		//分发执行
		$objDispatcher = new dispatcher();
		return $objDispatcher->dispatche( $arrRoute );
	}


    /**
     * cli模式启动方法
     */
    public static function cliRun( $strDirUrl )
    {
        if( empty( $_SERVER[ 'argv' ] ) ){
            exit( 'params cannot be empty!' );
        }

        //实例化对象时，自动引用该类文件
        $objCore = new core();
        $objCore->autoloadClass();

        //通过路由获取要执行的Module/Controller/Action
        $objRoute = new route();
        $arrRoute = $objRoute->getCAddressByParams( $strDirUrl );

        //分发执行
        $objDispatcher = new dispatcher();
        $objDispatcher->dispatche( $arrRoute );
    }

}

?>