<?php

namespace app\module\controller;

class fooController
{
    public function bar()
	{
		$a = new factoryController();
		try{
		    var_dump( $a->getArea(5) );
		}catch ( \Exception $e ){
    		var_dump( $e->getMessage() );exit;
		}
	}
}

?>