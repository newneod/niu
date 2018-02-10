<?php

namespace core\controller;

use core\framework\TRequest;

class CController
{
    use TRequest;

    public function __construct()
    {
        $this->checkRequest();
    }
}

?>