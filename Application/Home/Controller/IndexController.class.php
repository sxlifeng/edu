<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){        
        $this->assign('errInfo',session('errInfo'));
		$this->display();
    }
	
	public function checkLogin(){
		$login=M('login');
		$usernum=I('post.userNum');
		$password=I('post.userPwd');
		$condition['user']=$usernum;
		$query=$login->where($condition)->find();
		if($query) {
			$truePwd=$query['pwd'];
			if($truePwd==md5($password)){
			    $errInfo='  ';
				session('userNum',$usernum);
				session('errInfo',$errInfo);
				if($query['grade']==0){
				    $this->redirect('./Home/Student/Index/index');
				}
				if($query['grade']==1){
				    $this->redirect('./Home/Manage_1/Index/index');
				}
			}else {
			    $errInfo='账号密码不匹配!';
			    session('errInfo',$errInfo);
			    $this->redirect('/');
			}
		}else{
		    $errInfo='该账号不存在!';
			session('errInfo',$errInfo);
			$this->redirect('/');
		}
	}
	
	public function loginout() {
	        session(null);
	        $this->redirect('/');
	}
}