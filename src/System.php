<?php
namespace Pctco\Info;
/**
 * 操作系统
 */
class System{
	public static function getName(){
		$agent = $_SERVER['HTTP_USER_AGENT'];
		$os = false;
	    if (preg_match('/win/i', $agent) && strpos($agent, '95')){
	      $os = 'Windows 95';
	    }elseif (preg_match('/win 9x/i', $agent) && strpos($agent, '4.90')){
	      $os = 'Windows ME';
	    }elseif (preg_match('/win/i', $agent) && preg_match('/98/i', $agent)){
	      $os = 'Windows 98';
	    }
	    elseif (preg_match('/win/i', $agent) && preg_match('/nt 6.0/i', $agent)){
	      $os = 'Windows Vista';
	    }elseif (preg_match('/win/i', $agent) && preg_match('/nt 6.1/i', $agent)){
	      $os = 'Windows 7';
	    }elseif (preg_match('/win/i', $agent) && preg_match('/nt 6.2/i', $agent)){
	      $os = 'Windows 8';
	    }elseif(preg_match('/win/i', $agent) && preg_match('/nt 10.0/i', $agent)){
	      $os = 'Windows 10';#添加win10判断
	    }elseif (preg_match('/win/i', $agent) && preg_match('/nt 5.1/i', $agent)){
	      $os = 'Windows XP';
	    }elseif (preg_match('/win/i', $agent) && preg_match('/nt 5/i', $agent)){
	      $os = 'Windows 2000';
	    }elseif (preg_match('/win/i', $agent) && preg_match('/nt/i', $agent)){
	      $os = 'Windows NT';
	    }elseif (preg_match('/win/i', $agent) && preg_match('/32/i', $agent)){
	      $os = 'Windows 32';
	    }elseif (preg_match('/linux/i', $agent)){
	      $os = 'Linux';
	    }elseif (preg_match('/unix/i', $agent)){
	      $os = 'Unix';
	    }elseif (preg_match('/sun/i', $agent) && preg_match('/os/i', $agent)){
	      $os = 'SunOS';
	    }elseif (preg_match('/ibm/i', $agent) && preg_match('/os/i', $agent)){
	      $os = 'IBM OS/2';
	    }elseif (preg_match('/Mac/i', $agent) && preg_match('/PC/i', $agent)){
	      $os = 'Macintosh';
	    }elseif (preg_match('/Mac/i', $agent)){
	      $os = 'Mac';
	    }elseif (preg_match('/PowerPC/i', $agent)){
	      $os = 'PowerPC';
	    }elseif (preg_match('/AIX/i', $agent)){
	      $os = 'AIX';
	    }elseif (preg_match('/HPUX/i', $agent)){
	      $os = 'HPUX';
	    }elseif (preg_match('/NetBSD/i', $agent)){
	      $os = 'NetBSD';
	    }elseif (preg_match('/BSD/i', $agent)){
	      $os = 'BSD';
	    }elseif (preg_match('/OSF1/i', $agent)){
	      $os = 'OSF1';
	    }elseif (preg_match('/IRIX/i', $agent)){
	      $os = 'IRIX';
	    }elseif (preg_match('/FreeBSD/i', $agent)){
	      $os = 'FreeBSD';
	    }elseif (preg_match('/teleport/i', $agent)){
	      $os = 'teleport';
	    }elseif (preg_match('/flashget/i', $agent)){
	      $os = 'flashget';
	    }elseif (preg_match('/webzip/i', $agent)){
	      $os = 'webzip';
	    }elseif (preg_match('/offline/i', $agent)){
	      $os = 'offline';
	    }else{
	      $os = 'no';
	    }
	    return [
			 'name'	=>	$os,
			 'agent'	=>	$agent
		 ];
	}
}
