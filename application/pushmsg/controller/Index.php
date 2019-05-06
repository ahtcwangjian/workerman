<?php

/**
 * @Author: wangjian
 * @Date:   2019-05-06 16:35:08
 * @Last Modified by:   wangjian
 * @Last Modified time: 2019-05-06 16:49:57
 */
namespace app\pushmsg\controller;

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
