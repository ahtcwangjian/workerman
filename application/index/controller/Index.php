<?php

/**
 * @Author: wangjian
 * @Date:   2019-05-06 16:35:08
 * @Last Modified by:   wangjian
 * @Last Modified time: 2019-05-07 09:21:57
 */
namespace app\index\controller;

use think\Controller;

/**
 *
 */
class Index extends Controller
{

    public function index()
    {
        return $this->fetch();
    }

    /**
     * 发送消息给服务器弹屏
     * @Author   wangjian
     * @DateTime 2019-05-06
     * @return   [type]     [description]
     */
    public function send()
    {
        $data    = request()->param();
        $uid     = $data['uid'];
        $content = $data['content'];
        $this->pushWebMsg($uid,$content);
        // return json_encode(['code' = 200, 'msg' => '成功']);
    }

    /**
     * 推送弹屏消息
     * @Author   wangjian
     * @DateTime 2019-05-07
     * @return   [type]     [description]
     */
    public function pushWebMsg($to_uid,$content = '这个是推送的测试数据')
    {
        // 指明给谁推送，为空表示向所有在线用户推送
        // $to_uid = "";
		// 推送的url地址，使用自己的服务器地址
        $push_api_url = "http://127.0.0.1:2121/";
        $post_data    = array(
            "type"    => "publish",
            "content" => $content,
            "to"      => $to_uid,
        );
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $push_api_url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Expect:"));
        $return = curl_exec($ch);
        curl_close($ch);
        var_export($return);
    }
}
