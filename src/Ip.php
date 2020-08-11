<?php
namespace Pctco\Info;
 /**
 * @name Ip
 **/
class Ip{
   /**
   * @name range
   * @describe 判断ip是否在范围内
   * @param string $ip 0.0.0.0
   * @param array $IPSegment [192.168.0.1,192,168,5,255]
   * @return Bool
   **/
   public static function range($ip,$IPSegment){
      $result = false;
      if (self::format($ip) && self::format($IPSegment[0]) && self::format($IPSegment[1])) {
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
   * @name ABrange
   * @describe 判断两个IP段是否之间有相同的值
   * @param mixed $IPASegment [192.168.0.1,192,168,5,25]
   * @param mixed $IPBSegment [192.168.0.4,192,168,5,255]  $post的值
   * @return Bool
   **/
   public static function ABrange($IPASegment,$IPBSegment){
      $result = false; // 没有重负
      if (self::format($IPASegment) && self::format($IPBSegment)) {
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
      $result = false;
      if (self::format($IPSegment[0]) && self::format($IPSegment[1])) {
         $start = Judge::ipToInt($IPSegment[0]);
         $end = Judge::ipToInt($IPSegment[1]);

         if ($start>=$end) {
            $result = true; // 不合法IP段
         }
      }
      return $result;
   }
   /**
   * @name ipToInt
   * @describe IP转整数
   * @param string $ip 0.0.0.0
   * @param string $segment 1(段),2(段),3(段),4(段) 返回那几段  [1,3]
   * @return Int
   **/
   public static function ipToInt($ip,$segment = 0){
      if ($segment == 0) {
         $segment = [0,1,2,3];
      }
      $ip = explode('.',$ip);
      $n = [
         $ip[0]*256*256*256,
         $ip[1]*256*256,
         $ip[2]*256,
         $ip[3]
      ];
      $int = 0;
      foreach ($segment as $v) {
         $int = $int+$n[$v];
      }
      return $int;
   }
   /**
   * @name format
   * @describe IP格式验证
   * @param string $ip 0.0.0.0
   * @return
   **/
   public static function format($ip){
      $result = false;
      if (!empty($ip)) {
         $validate = new \think\Validate(
            ['ip' => 'ip']
         );
         if (is_array($ip)) {
            foreach ($ip as $ips) {
               if (empty($ips)) {
                  $result = false;
               }else{
                  $result = $validate->check(['ip'=>$ips]);
               }
               if ($result) {
                  break;
               }
            }
         }else{
            $result = $validate->check(['ip'=>$ip]);
         }
      }
      return $result;
   }
}
