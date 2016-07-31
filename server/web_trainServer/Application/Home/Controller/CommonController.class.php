<?php

namespace Home\Controller;
use Think\Controller;

Class CommonController extends Controller{
	Public function _initialize(){
		if(!isset($_SESSION['username'])){
			$this->redirect('home/index/index');
		}
	}
}
?>