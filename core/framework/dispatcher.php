<?php
namespace core\framework;

require 'conf/code.php';

class dispatcher
{
	/*
	 * 初始化单例数组
	 */
	private static $arrInstance = array();

	public function dispatche( $arrRoute )
	{
		require_once $arrRoute[ 'address' ];
		$strTempC = '\\app\\module\\controller\\' . $arrRoute[ 'c' ];//使用命名空间时
		//$strTempC = $arrRoute[ 'c' ];//不使用命名空间时

		if( !class_exists( $strTempC ) ){
			//throw new \ErrorException( 'controller not found!', HTTP_CODE_NOT_FOUND );
		}
		$objC = new $strTempC;
		$strTempA = $arrRoute[ 'a' ];
		return $objC->$strTempA();
	}
}


?>