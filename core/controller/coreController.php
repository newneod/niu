<?php

namespace core\controller;

class coreController
{

    public function __construct()
    {
        $this->autoloadClass();
    }


    public function autoloadClass()
	{
        spl_autoload_register( function( $strClassName ){
            echo $strClassName;exit;
            require $strClassName . '.php';
        }, true );
	}
}

?>