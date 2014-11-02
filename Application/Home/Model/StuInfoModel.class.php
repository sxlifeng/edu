<?php
namespace Home\Model;
use Think\Model;
Class StuInfoModel extends Model{
    protected $_map = array(
        //$data=array("stu_residence"=>$stuNewInfo['stuProvince'].'|'.$stuNewInfo['stuCity']);
        'stuCitizen' =>'stu_citizenship', // 把表单中stuCitizen映射到数据表的stu_citizenship字段         
        'stuNation'  =>'stu_nation',      
        'stuCardType'=>'stu_card_type',
        'stuCardNum'=>'stu_card_num',
        'stuBirthday'=>'stu_birth_day',
        'stuSex'=>'stu_sex',
        'stuPolitics'=>'stu_politics',
        'stuBelief'=>'stu_belief',
        'stuAddress'=>'stu_address',
        'stuTel'=>'stu_tel_num',
        'stuEmail'=>'stu_email',
        'ProjectName'=>'stu_gradu_project_name',
        'ProjectKey'=>'stu_gradu_project_key',
        'stuType'=>'stu_type',
        'stuGrade'=>'stu_grade',
        'stuEnterDate'=>'stu_enter_date',
        'stuMajor'=>'stu_major',
        'stuCompany'=>'stu_company',
        'stuTeacher'=>'stu_teacher',
        'preDegreeGrade'=>'stu_pre_degree_grade',
        'preDegreeType'=>'stu_pre_degree_type',
        'preDegreeCollege'=>'stu_pre_degree_college',
        'preDegreeDate'=>'stu_pre_degree_date',
        //''=>'',
        );
    }