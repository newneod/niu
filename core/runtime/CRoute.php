<?php
namespace core\framework;

class CRoute
{
    /**
     * cgi模式通过url获取路由地址
     * @return array
     */
	public function getCAddressByUrl()
	{
        $arrParams = $this->_getParamsByUrlMode();
		$strRequire = 'app/' . $arrParams[ 'm' ] . '/controller/' . $arrParams[ 'c' ] . 'Controller.php';
		if( !file_exists( $strRequire ) ){
			exit( $arrParams[ 'c' ] . 'Controller.php not found!' );
		}

		//返回待加载的controller地址
		return array( 'address' => $strRequire, 'm' => $arrParams[ 'm' ], 'c' => $arrParams[ 'c' ], 'a' => $arrParams[ 'a' ] );
	}


    /**
     * 通过配置文件中的urlMode获取url参数
     * @return array
     */
	private function _getParamsByUrlMode()
    {
        switch( URL_MODE ){
            case 0://普通模式
                $arrParams = $this->_getNormalUrlParams();
                break;
            case 1://pathinfo模式
                $arrParams = $this->_getPathInfoUrlParams();
                break;
            default://模式信息错误
                exit( 'url mode error!' );
                break;
        }
        return $arrParams;
    }


    /**
     * 通过常规模式url获取module、controller和action参数
     * @return array
     */
	private function _getNormalUrlParams()
    {
        //根据参数获取模块名，控制器名和方法名
        $strParams = parse_url( $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] )[ 'query' ];
        $arrParams = explode( '&', $strParams );

        if( count( $arrParams ) < 3 ){
            exit( 'please check your normal mode url!' );
        }

        $arrRes = array();//初始化最终结果
        foreach( $arrParams AS $key => $strParam ){
            $arrParam = explode( '=', $strParam );
            $arrRes[ $arrParam[ 0 ] ] = $arrParam[ 1 ];
        }

        //参数非空校验
        if( '' === $arrRes[ 'm' ] || '' === $arrRes[ 'c' ] || '' === $arrRes[ 'a' ] ){
            exit( 'param error!' );
        }

        return $arrRes;
    }


    /**
     * 通过pathInfo模式url获取module、controller和action参数
     * @return array
     */
    private function _getPathInfoUrlParams()
    {
        $strUrl = $_SERVER[ 'REQUEST_URI' ];
        $arrUrl = explode( 'index.php', $strUrl );
        if( count( $arrUrl ) != 2 ){
            exit( 'url error!' );
        }

        $arrParams = explode( '/', trim( $arrUrl[ 1 ], '/' ) );
        if( count( $arrParams ) < 3 ){
            exit( 'please check your pathinfo mode url!' );
        }

        //参数非空校验
        if( '' === $arrParams[ 0 ] || '' === $arrParams[ 1 ] || '' === $arrParams[ 2 ] ){
            exit( 'param error!' );
        }

        $arrRes = array();//初始化最终结果
        $arrRes[ 'm' ] = $arrParams[ 0 ];
        $arrRes[ 'c' ] = $arrParams[ 1 ];
        $arrRes[ 'a' ] = $arrParams[ 2 ];
        return $arrRes;
    }


    /**
     * cli模式通过传参获取路由地址
     * @return array
     */
    public function getCAddressByParams( $strDirUrl )
    {
        //文件存在性校验
        if( '' === $_SERVER[ 'argv' ][ 1 ] || '' === $_SERVER[ 'argv' ][ 2 ] || '' === $_SERVER[ 'argv' ][ 3 ] ){
            exit( 'param error!' );
        }
        $strRequire = 'app/' . $_SERVER[ 'argv' ][ 1 ] . '/controller/' . $_SERVER[ 'argv' ][ 2 ] . 'Controller.php';
        if( !file_exists( $strRequire ) ){
            exit( 'file not found!' );
        }

        //返回待加载的controller地址
        return array( 'address' => $strRequire, 'c' => $_SERVER[ 'argv' ][ 2 ], 'a' => $_SERVER[ 'argv' ][ 3 ] );
    }

}

?>