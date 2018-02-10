<?php 
namespace core\framework;

class CCore
{
    /*
	 * 初始化单例数组
	 */
    private static $arrInstances = array();


    /**
     * 自动引用类文件
     */
    public function autoloadClass()
    {
        spl_autoload_register( function( $strClassName ){
            require_once str_replace( '\\', '/', $strClassName ) . '.php';
        }, true );
    }


    /**
     * 单例模式返回实例化的类的对象
     * @param $strClassName
     * @return obj
     */
    public function instantiateClass( $strClassName )
    {
        if( !class_exists( $strClassName ) ){
            exit( 'class not exists!' );
        }

        if( self::$arrInstances[ $strClassName ] ){
            $obj = self::$arrInstances[ $strClassName ];
        }else{
            $obj = new $strClassName;
        }
        return $obj;
    }
}

?>