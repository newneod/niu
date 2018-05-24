<?php 
namespace core\framework;

use core\framework\CRoute;
use core\framework\CDispatcher;

require_once 'core/runtime/CRoute.php';
require_once 'core/runtime/CDispatcher.php';
require_once 'core/runtime/CCore.php';

class CInit
{
    /**
     * cgi模式启动方法
     */
	public static function run()
	{
	    //实例化对象时，自动引用该类文件
	    $objCore = new CCore();
	    $objCore->autoloadClass();

		//通过路由获取要执行的Module/Controller/Action
		$objRoute = new CRoute();
		$arrRoute = $objRoute->getCAddressByUrl();

		//分发执行
		$objDispatcher = new CDispatcher();
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
        $objCore = new CCore();
        $objCore->autoloadClass();

        //通过路由获取要执行的Module/Controller/Action
        $objRoute = new CRoute();
        $arrRoute = $objRoute->getCAddressByParams( $strDirUrl );

        //分发执行
        $objDispatcher = new CDispatcher();
        $objDispatcher->dispatche( $arrRoute );
    }

}

?>