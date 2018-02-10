<?php 
namespace core\framework;

trait TRequest
{
    public static $_GET = array();

    public static $_POST = array();

    public static $_PUT = array();

    public static $_DELETE = array();

    /**
     * 检查并处理参数
     */
    public function checkRequest()
    {
        $request_method = $_SERVER[ 'REQUEST_METHOD' ];
        if (!empty($_GET)) {
            foreach ($_GET as $key => $value) {
                self::$_GET[$key] = htmlspecialchars($value, ENT_QUOTES);
            }
        }
        if (!empty($_POST)) {
            foreach ($_POST as $key => $value) {
                self::$_POST[$key] = htmlspecialchars($value, ENT_QUOTES);
            }
        }
        //put delete参数
        if ($request_method == 'PUT' || $request_method == 'DELETE') {
            $params = file_get_contents('php://input');
            if (!empty($params)) {
                if (strstr($params, '&')) {
                    $param_arr = explode('&', $params);
                    foreach ($param_arr as $item) {
                        $tmp = explode('=', $item);
                        if ($request_method == 'PUT') {
                            self::$_PUT[$tmp[0]] = htmlspecialchars($tmp[1], ENT_QUOTES);
                        } else {
                            self::$_DELETE[$tmp[0]] = htmlspecialchars($tmp[1], ENT_QUOTES);
                        }
                    }
                } else {
                    if (strstr($params, '=')) {
                        $param_arr = explode('=', $params);
                        if ($request_method == 'PUT') {
                            self::$_PUT[$param_arr[0]] = htmlspecialchars($param_arr[1], ENT_QUOTES);
                        } else {
                            self::$_DELETE[$param_arr[0]] = htmlspecialchars($param_arr[1], ENT_QUOTES);
                        }
                    }
                }
            }
        }
    }

}

?>