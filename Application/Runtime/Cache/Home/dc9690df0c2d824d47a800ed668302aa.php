<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>电信科学技术研究院教务管理系统</title>
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/edu/Public/Css/my.css">
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript" src="/edu/Public/Js/my.js"></script>
<script>
var _menus = {"menus":[
						{"menuid":"1","icon":"icon-search","menuname":"教务管理",
							"menus":[
									{"menuid":"11","menuname":"成绩查询","icon":"icon-search1","url":"http://hxling.cnblogs.com"},
									{"menuid":"12","menuname":"课程管理","icon":"icon-edit1","url":"/edu/index.php/Home/Student/selectCourse"},
									{"menuid":"13","menuname":"毕业设计管理","icon":"icon-edit1","url":"/edu/index.php/Home/Student/graduProject"},
								]
						},{"menuid":"2","icon":"icon-edit","menuname":"信息管理",
							"menus":[{"menuid":"21","menuname":"个人基本信息管理","icon":"icon-edit1","url":"/edu/index.php/Home/Student/stuInfo"},
									{"menuid":"22","menuname":"家庭成员信息管理","icon":"icon-edit1","url":"/edu/index.php/Home/Student/stuFamilyInfo"},
									{"menuid":"23","menuname":"党员信息管理","icon":"icon-edit1","url":"/edu/index.php/Home/Student/communistInfo"},
									{"menuid":"24","menuname":"学籍信息管理","icon":"icon-edit1","url":"/edu/index.php/Home/Student/registerInfo"},
								]
						},{"menuid":"3","icon":"icon-lock","menuname":"系统设置",
							"menus":[{"menuid":"31","menuname":"修改密码","icon":"icon-key","url":"/edu/index.php/Home/Common/changePwd"}
								]
						}
				]};
</script>
</head>
   
<body class="easyui-layout" style="min-width:700px;">
	<div data-options="region:'north',border:false,href:'/edu/index.php/Home/Layout/north'" id='north'>north region</div>
	<div data-options="region:'west',split:true,title:'功能菜单'" id="west" style="width:200px;">
		<div id="nav" class="easyui-accordion" fit="true" border="false"></div>
	</div>
	<div data-options="region:'south',split:true,border:false" id="south">版权所有：电信科学技术研究院</div>
	<div data-options="region:'center',href:'/edu/index.php/Home/Layout/center'" id="mainPanle"></div>
	
	
	<div id="mm" class="easyui-menu" style="width:150px;">
		<div id="mm-tabupdate">刷新</div>
		<div class="menu-sep"></div>
		<div id="mm-tabclose">关闭</div>
		<div id="mm-tabcloseall">全部关闭</div>
		<div id="mm-tabcloseother">除此之外全部关闭</div>
		<div class="menu-sep"></div>
		<div id="mm-tabcloseright">当前页右侧全部关闭</div>
		<div id="mm-tabcloseleft">当前页左侧全部关闭</div>
		<div class="menu-sep"></div>
		<div id="mm-exit">退出</div>
	</div>
	</body>
</html>