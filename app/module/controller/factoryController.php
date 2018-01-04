<?php

namespace app\module\controller;

use app\module\controller\circleController;
use app\module\controller\rectangleController;
use Exception;

class factoryController
{
    public function getArea()
    {
        $iArgsNum = func_num_args();
        switch( $iArgsNum ){
            case 1:
                $obj = circleController::getInstance( func_get_arg( 0 ) );
                return $obj->getArea();
                break;
            case 2:
                $obj = rectangleController::getInstance( func_get_arg( 0 ), func_get_arg( 1 ) );
                return $obj->getArea();
                break;
            case 3:
                throw new \Exception( 'get area params error!', 500 );
                break;
        }
    }
}

?>