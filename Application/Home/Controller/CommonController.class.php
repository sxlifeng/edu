<?php
namespace Home\Controller;
use Think\Controller;
class CommonController extends Controller {
    public function changePwd(){ 
        $this->assign('userNum',session('userNum'));       
        $this->display();
    }
    
    public function updatePwd(){
        $tb=D('Login');
        $oldInfo=$tb->where('user='.session('userNum'))->find();
        if(md5(I('post.oldPwd'))!=$oldInfo['pwd']){
            echo json_encode(array('message'=>'旧密码输入错误','code'=>'2'));
        }else{
            $tb->pwd=md5(I('post.newPwd'));
            $tb->where('user='.session('userNum'))->save();
            echo json_encode(array('message'=>'密码修改成功，请牢记新密码!!','code'=>'0'));
        }
    }
	
}