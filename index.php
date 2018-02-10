<?php

require_once 'core/framework/CInit.php';
require_once 'conf/config.php';
require_once 'vendor/autoload.php';

switch( SAPI_MODE ){
    case 'CGI':
        core\framework\CInit::run();
        break;
    case 'CLI':
        core\framework\CInit::cliRun( dirname( __FILE__ ) );
        break;
}

?>