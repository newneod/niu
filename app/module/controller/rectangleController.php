<?php

namespace app\module\controller;

use app\module\interfaces\shapeInterface;

class rectangleController implements shapeInterface
{
    private static $_instance; 
    private $iWidth;
    private $iHeight;
    
    private function __construct( $iWidth, $iHeight )
    {
        $this->iWidth = $iWidth;
        $this->iHeight = $iHeight;
    }
    
    public static function getInstance( $iWidth, $iHeight )
    {
        if( !isset( self::$_instance ) ){
            self::$_instance = new self( $iWidth, $iHeight );
        }
        return self::$_instance;
    }
    
    public function getArea()
    {
        return $this->iHeight * $this->iWidth;
    }
}

?>