<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){

        $this->display();
    }

    public function login(){
    	if(!IS_POST) $this->error('页面不存在');

    	$username = I('username');
    	$password = I('password','','md5');

    	$admin = M('admin')->where(array('username' => $username))->find();
   		
   		if(!$admin || $admin['password'] != $password){
   			$this->error('账号或密码错误');
   		}

   		session('username',$admin['username']);

   		$this->redirect('home/admin/admin');
    }
}