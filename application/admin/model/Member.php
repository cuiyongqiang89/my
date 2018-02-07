<?php
namespace app\admin\model;

use think\Model;
class Member extends Model{
	public function checkMember($username,$password){
		$member=self::getByUsername($username);
		if($member['password']==$password){ 
			return $member;
		}else{
			return false;
		}
	}
}
?>
