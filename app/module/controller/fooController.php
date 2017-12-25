<?php

namespace app\module\controller;

require 'app/module/model/test.php';

class foo
{

    public function __construct()
    {

    }


    public function bar()
	{
		$a = new \app\module\model\test;
		$a->test1();
	}
}

?>