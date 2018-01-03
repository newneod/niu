<?php

namespace app\module\controller;

use app\module\model\testModel;

class fooController
{
    /**
     * 220918
     */
    public function bar()
	{
		$a = new testModel;
		$a->test();
	}
}

?>