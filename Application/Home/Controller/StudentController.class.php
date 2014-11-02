<?php
namespace Home\Controller;
use Think\Controller;
class StudentController extends Controller {
    public function index(){
		$userNum=session('userNum');
		$tb=M('stu_info');
		$condition['stu_num']=$userNum;
		$stuInfo=$tb->where($condition)->field('id,stu_name')->find();
		session('userName',$stuInfo['stu_name']);
		session('userId',$stuInfo['id']);
		$this->assign('stuInfo',$stuInfo);		
		$this->display();
    }
    public function stuInfo(){
        $userNum=session('userNum');
        $tb=M('stu_info');
        $condition['id']=session('userId');
        $stuInfo=$tb->where($condition)->field('stu_num,stu_name,stu_sex,stu_nation,stu_politics,stu_citizenship,stu_card_type,stu_card_num,stu_birth_day,stu_residence,stu_address,stu_tel_num,stu_email,stu_belief,stu_pic_path')->find();
        if ($stuInfo['stu_nation']==''||is_null($stuInfo['stu_nation']))$stuInfo['stu_nation']='01';
        if ($stuInfo['stu_card_type']==''||is_null($stuInfo['stu_card_type']))$stuInfo['stu_card_type']='01';
        if ($stuInfo['stu_politics']==''||is_null($stuInfo['stu_politics']))$stuInfo['stuPolitics']='01';
        if ($stuInfo['stu_sex']==''||is_null($stuInfo['stu_sex']))$stuInfo['stu_sex']='01';        
        if ($stuInfo['stu_residence']==''||is_null($stuInfo['stu_residence']))$stuResidence=array('-1','-1');
        $this->assign("stuNum",$stuInfo['stu_num']);
        $this->assign("stuName",$stuInfo['stu_name']);
        $this->assign("stuCitizen",$stuInfo['stu_citizenship']);
        $this->assign("stuNation",$stuInfo['stu_nation']);
        $this->assign('stuCardType',$stuInfo['stu_card_type']);
        $this->assign("stuCardNum",$stuInfo['stu_card_num']);
        $this->assign("stuBirthday",$stuInfo['stu_birth_day']);
        $this->assign("stuSex",$stuInfo['stu_sex']);
        $this->assign("stuPolitics",$stuInfo['stu_politics']);
        $this->assign("stuBelief",$stuInfo['stu_belief']);
        $stuResidence=explode('|', $stuInfo['stu_residence']);
        if (is_null($stuResidence[0]))$stuResidence[0]='-1';
        if (is_null($stuResidence[1]))$stuResidence[1]='-1';
        $this->assign("stuProvince",$stuResidence[0]);
        $this->assign("stuCity",$stuResidence[1]);
        $this->assign("stuAddress",$stuInfo['stu_address']);
        $this->assign("stuTel",$stuInfo['stu_tel_num']);
        $this->assign("stuEmail",$stuInfo['stu_email']);
        $this->assign("stuPic",$stuInfo['stu_pic_path']);
        $this->display();
    }
    
    public function updateStuInfo(){
        $stuNewInfo=I("post.");          
        $tb=M('stu_info');        
        $condition['id']=session('userId');        
        $data=array("stu_citizenship"=>$stuNewInfo['stuCitizen'],"stu_nation"=>$stuNewInfo['stuNation'],"stu_card_type"=>$stuNewInfo['stuCardType'],"stu_card_num"=>$stuNewInfo['stuCardNum'],"stu_birth_day"=>$stuNewInfo['stuBirthday'],"stu_sex"=>$stuNewInfo['stuSex'],"stu_politics"=>$stuNewInfo['stuPolitics'],"stu_belief"=>$stuNewInfo['stuBelief'],"stu_residence"=>$stuNewInfo['stuProvince'].'|'.$stuNewInfo['stuCity'],"stu_address"=>$stuNewInfo['stuAddress'],"stu_tel_num"=>$stuNewInfo['stuTel'],"stu_email"=>$stuNewInfo['stuEmail']);        
        if ($_FILES['stuPic']['error']!=4){
            $picInfo=$this->uploadImg();
            if(!is_array($picInfo)){
                $returnInfo=array("code"=>"01","message"=>$picInfo);
                echo $returnInfo=json_encode($returnInfo);
                return false;
            }else {
                $this->thumbImg($picInfo['stuPic']['savename'], $picInfo['stuPic']['savename']);
                $data['stu_pic_path']=$picInfo['stuPic']['savename'];
            }           
        }                
        $tb->where($condition)->data($data)->save();
        $returnInfo=array("code"=>"0","message"=>"信息保存成功！");
        echo $returnInfo=json_encode($returnInfo);
    }
    
    public function uploadImg(){
        $upload = new \Think\Upload();// 实例化上传类    
        $upload->maxSize   =     3145728 ;// 设置附件上传大小    
        $upload->exts      =     array('jpg', 'gif', 'png', 'jpeg');// 设置附件上传类型    
        $upload->rootPath  =     './Public/';
        $upload->savePath  =      './Image/Upload/'; // 设置附件上传目录   
        $upload->replace   =true;
        $upload->saveName = session('userNum'); 
        $upload->autoSub = false;
        // 上传文件    
        $info   =   $upload->upload();   
        if(!$info) {
            // 上传错误提示错误信息
            return $upload->getError();           
        }else{
            // 上传成功        
            return $info;  
        }
    }
    
    public function thumbImg($fileName,$thumbName) {
        $image = new \Think\Image();
        $imgRoot='./Public/';
        $imgPath='./Image/Upload/';
        $image->open($imgRoot.$imgPath.$fileName);
        // 生成一个居中裁剪的缩略图并保存为
        $image->thumb(200, 280,\Think\Image::IMAGE_THUMB_CENTER)->save($imgRoot.$imgPath.$thumbName);
    }
    
    public function getProvince(){
        $table=M('area');
        $pro=$table->field('code,name')->where('p_id=0')->select();
        $proHead=array("code"=>"-1","name"=>"请选择省份","selected"=>true);
        array_unshift($pro,$proHead);        
        echo $pro_json=json_encode($pro);        
    }
    
    public function getCity(){
        $pid=I('get.pid');
        $table=M('area');
        $conditon['p_id']=$pid;
        $city=$table->field('code,name')->where($conditon)->select();
        $cityHead=array("code"=>"-1","name"=>"请选择城市","selected"=>true);
        array_unshift($city,$cityHead);
        echo $city_json=json_encode($city);
    }
    
    public function stuFamilyJson(){
        $tb=D('StuFamily');
        $familyInfo=$tb->where('stu_id='.session('userId'))->select();
        foreach ($familyInfo as $key=>$familyInfoEach)            
        $familyInfo[$key]=$tb->parseFieldsMap($familyInfoEach);
        echo $familyInfo=json_encode($familyInfo);       
    }
    
    public function addFolk(){
        $Info=$_POST;
        $tb=D("StuFamily");        
        $tb->create();
        $tb->stu_id=session('userId');
        $insertId=$tb->add();
        if ($insertId){
            echo json_encode(array('success'=>true));
        }else {
            echo json_encode(array('errorMsg'=>'发生错误，请重试！如多次操作失败，请与系统管理员联系'));
        }
    }
    
    public function updateFolk(){
        $tb=D("StuFamily");
        $tb->create();
        $tb->id=I('get.id');
        $tb->stu_id=session('userId');
        $insertId=$tb->save();
        if ($insertId){
            echo json_encode(array('success'=>true));
        }else {
            echo json_encode(array('errorMsg'=>'发生错误，请重试！如多次操作失败，请与系统管理员联系'));
        }
    }
    
    public function delFolk(){
        $tb=D("StuFamily");
        $delId=$tb->delete($_POST['id']);
        if ($delId){
            echo json_encode(array('success'=>true));
        }else {
            echo json_encode(array('errorMsg'=>'发生错误，请重试！如多次操作失败，请与系统管理员联系'));
        }        
    }
    
    public function communistInfo(){
        $tb=D('CommunistInfo');
        $info=$tb->where('stu_id='.session('userId'))->find();
        $info=$tb->parseFieldsMap($info);
        $this->assign('communist',$info);
        $this->display();
    }
    
    public function editCommunistInfo() {
        $tb=D('CommunistInfo');
        $data=$tb->create();
        if($data['id']==''){
            $data['stu_id']=session('userId');
            array_splice($data,0,1);
            $insertId=$tb->add($data);
        }else {
            $insertId=$tb->save();
        }        
        if ($insertId){
            echo json_encode(array('message'=>'信息保存成功','code'=>'0'));
        }else {
            echo json_encode(array('message'=>'发生错误，请重试！可能因为您没有任何数据改动！','code'=>'1'));
        }
    }
    
    public function graduProject(){
        $tb=D('StuInfo');
        $info=$tb->field('stu_gradu_project_name,stu_gradu_project_key')->find(session('userId'));
        $info=$tb->parseFieldsMap($info);
        $this->assign('graduProject',$info);
        $this->display();
    }
    
    public function editGraduProject() {
        $tb=D('StuInfo');
        $tb->create();
        $tb->id=session('userId');
        $insertId=$tb->save();
        if ($insertId){
            echo json_encode(array('message'=>'信息保存成功','code'=>'0'));
        }else {
            echo json_encode(array('message'=>'发生错误，请重试！可能因为您没有任何数据改动！','code'=>'1'));
        }
    }
    
    public function registerInfo(){
        $tb=D('StuInfo');
        $info=$tb->find(session('userId'));
        $info=$tb->parseFieldsMap($info);
        $this->assign('register',$info);
        $this->display();
    }
    
    public function editRegisterInfo() {
        $tb=D('StuInfo');
        $tb->create();
        $tb->id=session('userId');
        $insertId=$tb->save();
        if ($insertId){
            echo json_encode(array('message'=>'信息保存成功','code'=>'0'));
        }else {
            echo json_encode(array('message'=>'发生错误，请重试！可能因为您没有任何数据改动！','code'=>'1'));
        }
    }
    
    public function selectedCourseJson(){
        $tb=D('CourseView');
        $data=$tb->select();
        foreach ($data as $key=>$dataOne)
        $data[$key]=$tb->parseFieldsMap($dataOne);
        echo json_encode($data);
    }
	
}