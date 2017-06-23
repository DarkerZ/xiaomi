<?php
namespace app\mobile\controller;

class Goods extends \think\Controller
{
	//查询所有商品列表
    public function index()
    {
    	$list = db('detail_format')->select();
        return json($list);
    }
    //获取单个信息
    public function read()
    {
    	$id = input('id');
    	$info = db('detail_format')->where("id=$id")->find();
        return json($info);
    }
}
