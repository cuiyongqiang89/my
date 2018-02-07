<?php
namespace app\admin\behavior;

use think\facade\Request;
use think\facade\Session;
class CheckLogin{
	public function run(){
		$module=Request::module();
		$controller=Request::controller();
		$action=Request::action();
		$url=$module.'/'.$controller.'/'.$action;
		$url=strtolower($url);

		$admin=Session::get('admin');
		if($module=='admin'){
			if(empty($admin)){
				if($url!='admin/index/login'){
					header('location:/index.php/admin/index/login');
				}
			}else{
				if($url=='admin/index/login'){
					header('location:/index.php/admin/index/index');
				}
			}	
		}

	}
}
?>
