<?php
// 本类由系统自动生成，仅供测试用途
namespace Home\Controller;
use Think\Controller;
class LayoutController extends Controller {
    public function index()
    {
    	$this->display();
    }
    
    public function north(){
        $this->assign('time',date('Y-m-d G:i:s'));
        $this->display();
    }
}
?>