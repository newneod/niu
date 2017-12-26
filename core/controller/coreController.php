<?php

namespace core\controller;

class coreController
{

    public function __construct()
    {

    }


    public function autoloadClass()
	{
        spl_autoload_register( function( $class_name ){
            require_once $class_name . '.php';
        } );
	}
}

?>