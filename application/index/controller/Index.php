<?php

/**
 * @Author: wangjian
 * @Date:   2019-05-06 16:35:08
 * @Last Modified by:   wangjian
 * @Last Modified time: 2019-05-06 17:02:30
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
}
