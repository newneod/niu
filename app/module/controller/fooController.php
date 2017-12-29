<?php

namespace app\module\controller;

use app\module\model\testModel;

class fooController
{
    public function bar()
	{
		$a = new testModel;
		$a->test();
	}
}

?>