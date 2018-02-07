<?php
namespace app\admin\controller;

use think\Controller;
use app\admin\model\Member;
use think\facade\Session;

class Index extends Controller{
	protected function initialize(){
		echo "init";
	}
	public function index(){
		echo "index";
	}
	public function login(){
		$username= $this->request->param('username');
		$password=$this->request->param('password');
		$member=new Member;
		$info=$member->checkMember($username,$password);
		if($info){
			if($info['groupid']==1){
				Session::set('admin',$info);
				$this->redirect('index');
			}
		}
		return $this->fetch();
	}

	public function logout(){
		Session::delete('admin');
		$this->redirect('login');
	}
}
?>
