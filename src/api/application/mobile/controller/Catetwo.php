<?php
namespace app\mobile\controller;

class Catetwo extends \think\Controller
{
	
	public function index()
	{
		$list = db('cate_two')->select();
		return json($list);
	}
	public function read()
	{
		$cate_id =input('id');
		$info = db('cate_id')->where("id=$cate_id")->find();
		return json($info);
	}
}

