<?php
namespace core\framework;

require_once 'core/framework/CCore.php';

class CDispatcher
{
	/*
	 * 初始化单例数组
	 */
	private static $arrInstances = array();


    /**
     * 分发到控制器，并执行对应方法并返回
     * @param array $arrRoute [ 'address', 'c', 'a' ]
     * @return mixed
     */
	public function dispatche( $arrRoute )
	{
		require_once $arrRoute[ 'address' ];
		$strTempC = '\\app\\' . $arrRoute[ 'm' ] . '\\controller\\' . $arrRoute[ 'c' ] . 'Controller';//使用命名空间时
		//$strTempC = $arrRoute[ 'c' ] . 'Controller';//不使用命名空间时

		if( !class_exists( $strTempC ) ){
			exit( '"' . $strTempC . '" is not exists!' );
		}

		if( isset( self::$arrInstances[ $strTempC ] ) ){
            $objC = self::$arrInstances[ $strTempC ];
        }else{
            $objC = new $strTempC;
            self::$arrInstances[ $strTempC ] = $objC;
        }

        $strTempA = $arrRoute[ 'a' ];
        if( isset( $strTempA ) ){
            return $objC->$strTempA();
        }else{
            return $objC;
        }
	}

}


?>