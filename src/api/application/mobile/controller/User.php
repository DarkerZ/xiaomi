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
				$user = db('user')->where($user_data)->find();
				$user['msg'] = 1;
				return jsonp($user);
			}else{
				$user['msg'] = 0;
				return jsonp($user);
			}
		}
		public function read(){
			$username = input('username');
			$password = input('password');
			$user = db('user')->where("username=$username")->where("password=$password")->find();
			if(empty($user)){
				$user['msg'] = 0;
				return jsonp($user);
			}else{
				$user['msg'] = 1;
				return jsonp($user);
			}
		}
	}
 ?>