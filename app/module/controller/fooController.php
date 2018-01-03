<?php

namespace app\module\controller;

use app\module\model\testModel;

class fooController
{
    /**
     * testMethod
     */
    public function bar()
	{
		$a = new testModel;
		$a->test();
	}
}

?>