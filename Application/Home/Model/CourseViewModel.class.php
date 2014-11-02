<?php
namespace Home\Model;
use Think\Model\ViewModel;
class CourseViewModel extends ViewModel {
    protected $_map = array(
        'stuId'=>'stu_id',
        'couId'=>'cou_id',
        'couTerm'=>'cou_term',
        'isDegree'=>'is_degree',
        'couHour'=>'cou_hour',
        'couCredit'=>'cou_credit',
        'scoreZk'=>'cou_score_zk',
        'scorebk'=>'cou_score_bk',
        'scoreCx'=>'cou_score_cx',
        'scoreValid'=>'cou_score_valid',
        'couNum'=>'cou_num',
        'couName'=>'cou_name',
        'couDepart'=>'cou_depart_name',
        'stuNum'=>'stu_num',
        'stuName'=>'stu_name',
    );
    public $viewFields = array(
        'StuCou'=>array('id','stu_id','cou_id','cou_term','is_degree','cou_hour','cou_credit','cou_score_zk','cou_score_bk','cou_score_cx','cou_score_valid'),     
        'CourseBase'=>array('cou_num','cou_name','cou_depart_name', '_on'=>'StuCou.cou_id=CourseBase.id'),     
        'StuInfo'=>array('stu_num','stu_name', '_on'=>'StuCou.stu_id=StuInfo.id'),          
    ); 
}