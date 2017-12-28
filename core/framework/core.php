<?php 
namespace core\framework;

class core
{
    public function autoloadClass()
    {
        spl_autoload_register( function( $strClassName ){
            $strClassName = str_replace( '\\', '/', $strClassName );
            require $strClassName . '.php';
        }, true );
    }
}

?>