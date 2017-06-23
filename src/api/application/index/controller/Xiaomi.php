<?php
namespace app\index\controller;
use think\Request;
use think\Page;

class Xiaomi{
    public function index()
    {
       $list=db('advert')->select();
     /*  print_r($list);*/
		return jsonp($list);
	}
}