<?php
namespace Home\Model;
use Think\Model;
Class StuFamilyModel extends Model{
    protected $_map = array(
        'stuId' =>'stu_id',    
        'folkName'  =>'folk_name',      
        'folkRelation'=>'folk_relation',
        'folkCompany'=>'folk_company',
        'folkPosition'=>'folk_position',
        'folkTel'=>'folk_tel',
        'folkAddress'=>'folk_address'
        );
    }