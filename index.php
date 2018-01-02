<?php

require 'core/framework/init.php';
require 'conf/config.php';

switch( SAPI_MODE ){
    case 'CGI':
        core\framework\init::run();
        break;
    case 'CLI':
        core\framework\init::cliRun( $argv, dirname( __FILE__ ) );
        break;
}

?>