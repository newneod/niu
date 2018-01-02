<?php
namespace core\framework;

class route
{
    /**
     * cgi模式通过url获取路由地址
     * @return array
     */
	public function getCAddressByUrl()
	{
		//根据参数获取模块名，控制器名和方法名
		$strParams = parse_url( $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] )[ 'query' ];
		$arrParams = explode( '&', $strParams );
		$arrRes = array();
		foreach( $arrParams AS $key => $strParam ){
			$arrParam = explode( '=', $strParam );
			$arrRes[ $arrParam[ 0 ] ] = $arrParam[ 1 ];
		}
//        $arrRes[ 'c' ] .= 'Controller';

		//文件存在性校验
		if( '' === $arrRes[ 'm' ] || '' === $arrRes[ 'c' ] || '' === $arrRes[ 'a' ] ){
			exit( 'param error!' );
		}
		$strRequire = 'app/' . $arrRes[ 'm' ] . '/controller/' . $arrRes[ 'c' ] . 'Controller.php';
		if( !file_exists( $strRequire ) ){
			exit( 'file not found!' );
		}

		//返回待加载的controller地址
		return array( 'address' => $strRequire, 'c' => $arrRes[ 'c' ], 'a' => $arrRes[ 'a' ] );
	}


    /**
     * cli模式通过传参获取路由地址
     * @return array
     */
    public function getCAddressByParams( array $arrParams, $strDirUrl )
    {
        //文件存在性校验
        if( '' === $arrParams[ 1 ] || '' === $arrParams[ 2 ] || '' === $arrParams[ 3 ] ){
            exit( 'param error!' );
        }
        $strRequire = 'app/' . $arrParams[ 1 ] . '/controller/' . $arrParams[ 2 ] . 'Controller.php';
        if( !file_exists( $strRequire ) ){
            exit( 'file not found!' );
        }

        //返回待加载的controller地址
        return array( 'address' => $strRequire, 'c' => $arrParams[ 2 ], 'a' => $arrParams[ 3 ] );
    }
}

?>