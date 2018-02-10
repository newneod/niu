<?php
namespace core\framework;

class CRpc
{
    private static $handleCurl;

    private static $handleCurlMulti;

    /**
     * 通过curl方式获取数据
     */
    public function getCurl()
    {
        self::$handleCurl = curl_init();
    }


    /**
     * 通过curl方式获取数据
     */
    public function getCurlMulti()
    {

    }
}


?>