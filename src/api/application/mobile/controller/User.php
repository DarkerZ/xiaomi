<?php 
	namespace app\mobile\controller;

	class User extends \think\Controller{
		public function create(){
			// $para = Request::instance()->param();
			$user_data = array(
					'username'=>input('username'),
					'password'=>input('password')
				);
			$vali = validate("user");
			if($vali->check($user_data)){
				db('user')->insert($user_data);
				return jsonp(1);
			}else{
				return jsonp(0);
			}
		}
		public function read(){
			$username = input('username');
			$password = input('password');
			$user = db('user')->where("username=$username")->where("password=$password")->find();
			if(empty($user)){
				return jsonp(0);
			}else{
				return jsonp(1);
			}
		}
	}
 ?>