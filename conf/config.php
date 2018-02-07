<?php
/**
 * SAPI模式
 * CLI为命令行模式，eg: $ ./index.php module controller action
 * CGI为web-server模式
 */
define( 'SAPI_MODE', 'CGI' );

/**
 * URL模式
 * 0为普通模式，eg:host/index.php?m=module&c=controller&a=action&param1Key=param1Value&param2Key=param2Value&...
 * 1为pathinfo模式，eg:host/index.php/module/controller/action/param1Key/param1Value/param2Key/param2Value/...
 */
define( 'URL_MODE', 0 );
?>