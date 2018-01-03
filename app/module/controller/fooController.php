<?php

namespace app\module\controller;

use app\module\model\testModel;

class fooController
{
    /**
     * testMethod try tag1
     */
    public function bar()
	{
		$a = new testModel;
		$a->test();
	}
}

?>