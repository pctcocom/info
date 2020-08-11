<?php
namespace Pctco\Info;
/**
 * 浏览器
 */
class Broswer{
	public static function getName(){
		//获取用户代理字符串
		$sys = $_SERVER['HTTP_USER_AGENT'];
	    if(stripos($sys, "Firefox/") > 0) {
			 //获取火狐浏览器的版本号
	         preg_match("/Firefox\/([^;)]+)+/i", $sys, $b);
	         $exp[0] = "Firefox";
	         $exp[1] = $b[1];
	    }elseif (stripos($sys, "Maxthon") > 0) {
	         preg_match("/Maxthon\/([\d\.]+)/", $sys, $aoyou);
	         $exp[0] = "Maxthon";
	         $exp[1] = $aoyou[1];
	    }elseif (stripos($sys, "MSIE") > 0) {
			 //获取IE的版本号
	         preg_match("/MSIE\s+([^;)]+)+/i", $sys, $ie);
	         $exp[0] = "IE";
	         $exp[1] = $ie[1];
	    }elseif (stripos($sys, "OPR") > 0) {
	         preg_match("/OPR\/([\d\.]+)/", $sys, $opera);
	         $exp[0] = "Opera";
	         $exp[1] = $opera[1];
	    }elseif(stripos($sys, "Edge") > 0) {
	         //win10 Edge浏览器 添加了chrome内核标记 在判断Chrome之前匹配
	         preg_match("/Edge\/([\d\.]+)/", $sys, $Edge);
	         $exp[0] = "Edge";
	         $exp[1] = $Edge[1];
	    }elseif (stripos($sys, "Chrome") > 0) {
			 //获取google chrome的版本号
	         preg_match("/Chrome\/([\d\.]+)/", $sys, $google);
	         $exp[0] = "Chrome";
	         $exp[1] = $google[1];
	    }elseif(stripos($sys,'rv:')>0 && stripos($sys,'Gecko')>0){
	         preg_match("/rv:([\d\.]+)/", $sys, $IE);
	         $exp[0] = "IE";
	         $exp[1] = $IE[1];
	    }else{
	        $exp[0] = "Unknown browser";
			$exp[1] = "";
	    }
	    return [
			 'name'	=>	$exp[0],
			 'version'	=>	$exp[1]
		 ];
	}
}
