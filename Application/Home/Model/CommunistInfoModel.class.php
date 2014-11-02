<?php
namespace Home\Model;
use Think\Model;
Class CommunistInfoModel extends Model{
    protected $_map = array(
        'joinDate' =>'join_date',    
        'confirmDate'  =>'confirm_date',      
        'duesDateBegin'=>'dues_date_begin',
        'getCompany'=>'get_company',
        'comAddress'=>'com_address',
        'comZipcode'=>'com_zipcode',
        'comPersonName'=>'com_person_name',
        'comPersonTel'=>'com_person_tel',
        'duesDateEnd'=>'dues_date_end'
        );
    }