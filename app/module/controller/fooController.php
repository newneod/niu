<?php

namespace app\module\controller;

use app\module\model\testModel;

class fooController
{
    /**
     * 222245
     */
    public function bar()
	{
		$a = new testModel;
		$a->test();
	}
}

?>