<?php

class Weibo
{

    private $cookie_path = null;
    private $mid_path = null;

    const LOGIN_URL = 'https://login.sina.com.cn/sso/login.php?client=ssologin.js(v1.4.15)&_=1403138799543';
    const COMMENT_ADD_URL = 'https://weibo.com/aj/v6/comment/add';

    private $users = [
//        ['account' => '17717604059', 'password' => 'Jwan830', 'nickname' => '牧场的小野马'],
//        ['account' => '17717604597', 'password' => 'Jwan830', 'nickname' => '脱离高级趣味的网黄少女'],
//        ['account' => '17717604362', 'password' => 'Jwan830', 'nickname' => '奈奈叫我喝牛奶'],
//        ['account' => '17717604357', 'password' => 'Jwan830', 'nickname' => '小萌萌妹萌'],
//        ['account' => '17717604367', 'password' => 'Jwan830', 'nickname' => '一只特立独行的猪'],
    ];
    private $weibao = [
        ['id' => '5586100914', 'screen_name' => "花椒直播", 'containerid' => '1076035586100914'],
//        ['id' => '2411842134', 'screen_name' => "360手机助手", 'containerid' => '1076032411842134'],
//        ['id' => '5796731205', 'screen_name' => "一直播", 'containerid' => '1076035796731205'],
//        ['id' => '6446374543', 'screen_name' => "芝士超人", 'containerid' => '1076036446374543'],
//        ['id' => '5796731205', 'screen_name' => "疯狂夺金", 'containerid' => '1076035796731205'],
//        ['id' => '1642904381', 'screen_name' => "优酷", 'containerid' => '1076031642904381'],
//        ['id' => '5700092581', 'screen_name' => "熊猫直播", 'containerid' => '2302835700092581'],
//        ['id' => '6193835443', 'screen_name' => "西瓜视频百万英雄", 'containerid' => '1076036193835443'],
//        ['id' => '6134987991', 'screen_name' => "冲顶大会", 'containerid' => '1076036134987991'],
//        ['id' => '5700092581', 'screen_name' => "网易大赢家", 'containerid' => '10080809a6e2738bc95b315fdd5ac5a27c84f0'],
            //https://m.weibo.cn/api/container/getIndex?from=feed&sudaref=m.weibo.cn&display=0&retcode=6102&type=topic&value=贴吧百万富翁
//        ['id' => '5700092581', 'screen_name' => "贴吧百万富翁", 'containerid' => '100808c194cb0403e0c4530fc4b95e8b961071'],
    ];
    private $list = [
        '大家答完这个可以去玩今晚八点半，题目基本跟小学知识差不多，基本都能对',
        '给大家介绍一个场次多，金额高的答题软件，今晚八点半',
        '大家可以去今晚八点半，填我邀请码856273,百分百得5元加2张复活卡',
        '这个也太慢了，还是今晚八点半的答题节奏快，金额也高',
        '今晚八点半答题APP下载就有现金10元，一般人我不告诉他',
        '答完这个，大家一起去今晚八点半答题吧，每天都靠今晚八点半答题赚饭钱',
        '自从用了另外一个答题APP：今晚八点半，每天都有钱拿，月入上万不是梦',
        '小伙伴们，我们去挖空今晚八点半的奖金吧，记得填我邀请码856273，填了就有10块',
        '告诉大家另一个APP，今晚八点半，下载就有10块钱，填我邀请码856273再加5块',
        '这个太难了，还是今晚八点半的题目简单，超有成就感',
        '今晚八点半答对一题奖励5元，下载登录就有红包',
        '还是觉得今晚八点半好，节奏快，题目简单，主持人好看，还能拿钱',
        '今晚八点半快开始了，我要溜了，那边百分百能拿钱',
        '组队今晚八点啦，今天奖金好高，我要去赚饭钱了',
        '"今晚八点半APP',
        '待会还可以玩今晚八点半',
        '题多 简单 接着赚钱"',
        '"今晚八点半时间设置正好不重啊',
        '接着还可以玩 哈哈哈"',
        '"还是今晚八点半好',
        '容易拿钱，巨有成就感"',
        '"今晚八点半APP',
        '全家一起玩',
        '增进娱乐"',
        '"今晚八点半APP',
        '邀请码856273 拿5元',
        '邀请码856273 拿5元',
        '邀请码856273 拿5元',
        '邀请码856273 拿5元"',
        '"今晚八点半APP',
        '场次多 节奏快 主持人废话少 ',
        '重点是钱多"',
        '"今晚八点半 每天百万场',
        '每天拿钱多多"',
        '"今晚八点半',
        '一天有四场 哈哈哈哈哈"',
        '"大家一起去玩今晚八点半',
        '节奏快 时间不重 一起拿钱"',
        '"今晚八点半也很好玩啊 ',
        '题目比这个简单 拿钱快 ',
        '大家一起发财 哈哈哈"',
        '"大家一起今晚八点半发发财 ',
        '点点复活卡啊 ',
        '赚赚小钱"',
        '"时间和今晚八点半不重',
        '发财发财 ',
        '哈哈哈"',
        '"今晚八点半 ',
        '钱多 场次多',
        '嘿嘿嘿"',
        '"大家一起加个好友，玩玩今晚八点半背',
        '时间又不重，加个好友认识下',
        '邀请码 856273',
        '邀请码 856273',
        '邀请码 856273"',
        '"今晚八点半的题好简单啊',
        '安利大家玩',
        '入账稳定 赚个饭钱不是梦想"',
        '"今晚八点半的钱好多',
        '时间也不重',
        '看来这是软件都为我们大众想好的啊',
        '好好好！"',
        '"今晚八点半 ',
        '主持人话少',
        '一天可以玩4场',
        '10块钱不是梦想"',
        '"下载今晚八点半就有钱',
        '简单啊',
        '记得填我邀请码856273',
        '记得填我邀请码856273"',
        '"这个场次玩后还可以去玩今晚八点半',
        '时间不重',
        '很好',
        '多赚赚小钱"',
        '"答题节目还有今晚八点半',
        '简单啊 拿钱容易',
        '我儿子都会做',
        '推荐大家玩"',
    ];
    private $mids = [];

    public function __construct()
    {
        $this->cookie_path = dirname(__FILE__) . '/cookies';
        $this->mid_path = dirname(__FILE__) . '/mids';
    }

    //登陆
    private function login($account, $password)
    {
        $data['entry'] = 'sso';
        $data['gateway'] = '1';
        $data['from'] = 'null';
        $data['savestate'] = '30';
        $data['useticket'] = '0';
        $data['pagerefer'] = '';
        $data['vsnf'] = '1';
        $data['su'] = base64_encode($account);
        $data['service'] = 'sso';
        $data['sp'] = $password;
        $data['sr'] = '1920*1080';
        $data['encoding'] = 'UTF-8';
        $data['cdult'] = '3';
        $data['domain'] = 'sina.com.cn';
        $data['prelt'] = '0';
        $data['returntype'] = 'TEXT';

        $header = [
            'Accept' => '*/* ',
            'Accept-Encoding' => 'gzip, deflate, br',
            'Accept-Language' => 'zh-CN,zh;q=0.9,en;q=0.8,zh-TW;q=0.7',
            'Connection' => 'keep-alive',
            'Content-Type' => 'application/x-www-form-urlencoded',
            'Cookie' => '_T_WM=ca792ce80be284efe435b0201e2afdcf; login=966ea0a87f4cbf4599f17efc97e14ba9; SUHB=0S7DQSvFd08GdS; SCF=AuPbGS2HcMg8UTi9-BkMvD-jxbl_Aq6lZocHefrC9rvmCxuSFH0uDJDj5aJoDvDsCcICrZ5gcymKTb3WQzz5e6A.',
            'DNT' => '1',
            'Host' => 'login.sina.com.cn',
            'Origin' => 'https://weibo.com',
            'Referer' => 'https://weibo.com/',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',
        ];

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::LOGIN_URL);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 2);
        $result = curl_exec($ch);
        curl_close($ch);
        return json_decode($result, true);
    }

    //cookie
    private function cookie($url, $account)
    {
        $header = [
            'Accept' => ' */*',
            'Accept-Encoding' => 'gzip, deflate, br',
            'Accept-Language' => 'zh-CN, zh;q = 0.9, en;q = 0.8, zh-TW;q = 0.7',
            'Connection' => 'keep-alive',
            'DNT' => '1',
            'Host' => 'passport.weibo.com',
            'Referer' => 'https://weibo.com/',
            'User-Agent' => 'Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36',
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_COOKIEJAR, $this->cookie_path . '/' . $account);
        curl_setopt($ch, CURLOPT_AUTOREFERER, true);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        $result = curl_exec($ch);
        curl_close($ch);
        return $result;
    }

    //批量评论
    public function comments()
    {
        $status = true;
        foreach ($this->mids as $mid) {
            foreach ($this->list as $content) {
                //随机用户评论
                $comment_status = $this->comment($mid, $content, $this->users[rand(0, count($this->users) - 1)]['account']);
                if ($comment_status == false) {
                    return false;
                }
            }
        }
        return $status;
    }

    //单条评论
    private function comment($mid, $content, $account)
    {
        $data['act'] = 'post';
        $data['mid'] = $mid;
        $data['uid'] = '1836520172';
        $data['content'] = $content;

        $curl = curl_init();
        $query = http_build_query($data, '', '&');
        curl_setopt_array($curl, array(
            CURLOPT_URL => self::COMMENT_ADD_URL,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_COOKIEFILE => $this->cookie_path . '/' . $account,
            CURLOPT_POST => 1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => $query,
            CURLOPT_HTTPHEADER => array(
                "Accept: */*",
                "Accept-Encoding: gzip, deflate, br",
                "Accept-Language: zh-CN,zh;q=0.9,en;q=0.8,zh-TW;q=0.7",
                "Cache-Control: no-cache",
                "Content-Type: application/x-www-form-urlencoded",
                "DNT: 1",
                "Host: weibo.com",
                "Origin: https://weibo.com",
                "Referer: https://weibo.com/u/2456913295?from=usercardnew&refer_flag=0000020001_&is_all=1",
                "User-Agent: Mozilla/5.0 (Windows NT 10.0; WOW64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36",
                "content-type: multipart/form-data; boundary=----WebKitFormBoundary7MA4YWxkTrZu0gW"
            ),
        ));

        $result = curl_exec($curl);
        curl_close($curl);
        die(var_dump($result));
        return $result;
    }

    public function run()
    {
        //获取所以最新mid列表
        foreach ($this->weibao as $weibao) {
            $mids = $this->getMids($weibao['containerid']);
            $this->mids = array_merge($this->mids, $mids);
        }

        //如果无任务，正常返回
        if (empty($this->mids)) {
            return true;
        }

        $status = $this->comments();
        if (!$status) {
            foreach ($this->users as $user) {
                $login_data = $this->login($user['account'], $user['password']);
                if (isset($login_data['crossDomainUrlList']))
                    $this->cookie($login_data['crossDomainUrlList'][0],$user['account']); //获取cookie
            }
            $this->comments();
        }
    }

    //非重要级操作，文件处理轻量级未作锁动作
    public function getMids($containerid)
    {
        $mids_old = '';
        if (file_exists($this->mid_path . '/' . $containerid))
            $mids_old = file_get_contents($this->mid_path . '/' . $containerid);

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://m.weibo.cn/api/container/getIndex?containerid=" . $containerid,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => ["Cache-Control: no-cache"],
        ));
        $response = curl_exec($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        $mids = [];
        foreach ($data['data']['cards'] as $card) {
            $mids[] = $card['mblog']['mid'];
        }
        $result = array_diff($mids, explode(',', $mids_old));
//        $result = $mids;
        if (!empty($result)) {
            file_put_contents($this->mid_path . '/' . $containerid, implode(',', $mids));
        }
        return $result;
    }

}

$weibo = new Weibo();
$weibo->run();
//评论
//如果评论失败，进行重置cookie,防止死循环，仅操作一次。
?>