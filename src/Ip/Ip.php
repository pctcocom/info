<?php
namespace Pctco\Info\Ip;
use Pctco\Info\Ip\Ipipnet\Ipipnet;
 /**
 * @name Ip
 **/
class Ip{
   /**
   * @name Home Address
   * @describe 归属地址
   * @param mixed $ip 1.1.1.1
   * @param mixed $net 使用那个网络的数据库  [ipip.net]
   * @param mixed $spacer 间隔符
   * @return
   **/
   public static function HomeAddress($ip,$net,$spacer = '-'){
      if ($net === 'ipip.net') {
         $arr = array_filter(array_unique(Ipipnet::find($ip)));
         $re = implode($spacer,$arr);
         return $re;
      }
   }

   /**
   * @name range
   * @describe 判断ip是否在范围内
   * @param string $ip 192.168.0.100
   * @param array $IPSegment ['192.168.0.1','192.168.5.255']
   * @return Bool
   **/
   public static function range($ip,$IPSegment){
      $result = false;
      if (self::check($ip) && self::check($IPSegment[0]) && self::check($IPSegment[1])) {
         $ip = self::ipToInt($ip);
         $start = self::ipToInt($IPSegment[0]);
         $end = self::ipToInt($IPSegment[1]);

         if ($ip>=$start && $ip<=$end) {
            $result = true; // IP在范围内
         }
      }
      return $result;
   }
   /**
   * @name IP Segment Compared
   * @describe 判断两个IP段是否之间有相同的值
   * @param mixed $IPASegment [192.168.0.1,192.168.5.25]
   * @param mixed $IPBSegment [192.168.0.4,192.168.5.255]  $post的值
   * @return Bool
   **/
   public static function IPSegmentCompared($IPASegment,$IPBSegment){
      $result = false; // 没有相同的值
      if (self::check($IPASegment) && self::check($IPBSegment)) {
         $a1 = explode('.',$IPASegment[0]);
         $a2 = explode('.',$IPASegment[1]);
         $b1 = explode('.',$IPBSegment[0]);
         $b2 = explode('.',$IPBSegment[1]);

         $segment3 = array_intersect(range($a1[2],$a2[2]),range($b1[2],$b2[2]));
         $result = !empty($segment3);
         if ($result) {
            foreach ($segment3 as $v) {
               // 获取段3中要多少重负的值
               if ($v == $b1[2]) {
                  if ($a1[2] == $v) {
                     $result = in_array($a1[3],range($b1[3],$b2[3]));
                  }elseif ($a2[2] == $v) {
                     $result = in_array($a2[3],range($b1[3],$b2[3]));
                  }
                  if ($result) {
                     break;
                  }
               }
            }
         }
         return $result;
      }
   }
   /**
   * @name segment
   * @describe 判断IP段是否是正确，开始和结束是否合法
   * @param array $IPSegment [192.168.0.1,192,168,5,255]
   * @return Bool
   **/
   public static function segment($IPSegment){
      $result = true;
      if (self::check($IPSegment[0]) && self::check($IPSegment[1])) {
         $start = self::ipToInt($IPSegment[0]);
         $end = self::ipToInt($IPSegment[1]);

         if ($start >= $end) {
            $result = false; // 不合法IP段
         }
      }
      return $result;
   }
   /**
   * @name ipToInt
   * @describe 计算IP转整数
   * @param string $ip 0.0.0.0
   * @return Int
   **/
   public static function ipToInt($ip){
      $ip = explode('.',$ip);
      $n = [
         $ip[0]*256*256*256,
         $ip[1]*256*256,
         $ip[2]*256,
         $ip[3]
      ];
      $int = 0;
      foreach ([0,1,2,3] as $v) {
         $int = $int+$n[$v];
      }
      return $int;
   }
   /**
   * @name check
   * @describe IP格式验证 验证成功 则返回 ip地址 , 失败则返回 false
   * @param string $ip 0.0.0.0
   * @return
   **/
   public static function check($ip){
      // 验证[1.1.1.1,2.2.2.2]
      if (is_array($ip)) {
         foreach ($ip as $v) {
            if (filter_var($v, FILTER_VALIDATE_IP) === false) {
               return false;
            }
         }
         return true;
      }
      // 验证1.1.1.1
      return filter_var($ip, FILTER_VALIDATE_IP) !== false?true:false;
   }
}
