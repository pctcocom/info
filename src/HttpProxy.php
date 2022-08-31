<?php
namespace Pctco\Info;
use app\Model\Temporary;
use think\facade\Log;
class HttpProxy{
    function __construct(){
        $this->temporary = new Temporary;
    }

    public function get(){
        $ip = 
        $this->temporary
        ->where('type','httpproxy')
        ->order('timers')
        ->find();

        if ($ip !== null) {
            $where = [
                'type'  =>  'httpproxy',
                'time'  =>  $ip->time,
                'n1'  =>  $ip->n1,
                'n2'  =>  $ip->n2
            ];

            if ($ip->time <= time()) {
                $this->temporary
                ->where($where)
                ->delete();

                return $this->get();
            }


            $this->temporary
            ->where($where)
            ->update([
                'timers'  =>  time()
            ]);
            return $ip->toArray();
        }
        $this->zmhttp();
        return false;
        
    }
    /** 
     ** 芝麻HTTP
     *? @date 22/07/07 21:05
     *! @url https://www.zmhttp.com/
     *  @param myParam1 Explain the meaning of the parameter...
     *  @param myParam2 Explain the meaning of the parameter...
     *! @return 
     */
    private function zmhttp(){
        /** 
         ** 代理ip
        *? @date 22/07/07 20:11
        */
        $client = new \GuzzleHttp\Client();
        $proxy = 
        $client->request('GET','http://webapi.http.zhimacangku.com/getip?num=2&type=2&pro=0&city=0&yys=0&port=1&pack=17597&ts=1&ys=1&cs=1&lb=1&sb=0&pb=4&mr=2&regions=110000,120000,130000,150000,210000,220000,230000,310000,320000,330000,340000,350000,360000,370000,410000,420000,430000,440000,450000,500000,510000,520000,610000,630000,640000');

        if ($proxy->getStatusCode() == 200) {
            $proxy->getHeaderLine('application/json; charset=utf8');
            $proxy = json_decode($proxy->getBody()->getContents(),true);
        }

        if ($proxy['code'] === 0) {
            foreach ($proxy['data'] as $v) {
                $this->temporary->save([
                    'type'  =>  'httpproxy',
                    'time'  =>  strtotime($v['expire_time']),
                    'n1'    =>  $v['ip'],
                    'n2'    =>  $v['port'],
                    'n3'    =>  $v['city'],
                    'n4'    =>  $v['isp'],
                    'n5'    =>  86
                ]);
            }
            return [
                'code'  =>  $proxy['code'],
                'msg'   =>  $proxy['msg']
            ];
        }else{
            $tips = 'Error code: '.$proxy['code'].' '.$proxy['msg'];
            Log::channel('behavior')->composer($tips);
            return [
                'code'  =>  $proxy['code'],
                'msg'   =>  $proxy['msg']
            ];
        }
    }
}