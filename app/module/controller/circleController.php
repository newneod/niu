<?php

namespace app\module\controller;

use app\module\interfaces\shapeInterface;

class circleController implements shapeInterface
{
    private static $_instance;
    private $iRadius;
    
    private function __construct( $iRadius )
    {
        $this->iRadius = $iRadius;
    }
    
    public static function getInstance( $iRadius )
    {
        if( !isset( self::$_instance ) ){
            self::$_instance = new self( $iRadius );
        }
        return self::$_instance;
    }
    
    public function getArea()
    {
        return $this->iRadius * $this->iRadius * M_PI;
    }
}

?>