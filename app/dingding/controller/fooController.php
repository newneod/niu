<?php

namespace app\dingding\controller;

use core\controller\CController;

class fooController extends CController
{
    public function bar()
	{
		var_dump(self::$_GET);exit;
	}
}

?>