<?php

namespace core\controller;

use core\controller\TRequest;

class CController
{
    use TRequest;

    public function __construct()
    {
        $this->checkRequest();
    }
}

?>