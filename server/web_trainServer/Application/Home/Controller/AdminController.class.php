<?php
namespace Home\Controller;
use Think\Controller;
class AdminController extends CommonController {


    public function index(){
        $this->display();
    }

    public function logout(){
        session_unset();
        session_destroy();
        $this->redirect('home/index/index');
    }

    public function admin(){
        $this->display();
    }
}
