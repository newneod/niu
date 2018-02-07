<?php

require_once 'core/framework/init.php';
require_once 'conf/config.php';
require_once 'vendor/autoload.php';

switch( SAPI_MODE ){
    case 'CGI':
        core\framework\init::run();
        break;
    case 'CLI':
        core\framework\init::cliRun( dirname( __FILE__ ) );
        break;
}

?>