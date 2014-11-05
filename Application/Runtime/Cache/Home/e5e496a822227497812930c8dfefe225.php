<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<title>教务管理系统</title>
	</head>
	<body class="easyui-layout">
	<div class="mybanner">
		<div id="top_left"> <img src="/edu/Public/Image/logo.gif" alt="教务系统Logo" /></div>
		<div id="top_middle">教务管理系统</div>
		<div id="top_right">
			<ul>
                <li class="time"><?php echo ($time); ?></li>
                <li class="welcome">当前用户<span class='show_user_name'><?php echo $_SESSION['userName']."(学生)"?></span></li>
                <li class="logout"><a href="javascript:void(0)"  onclick="confirm1();">退出登录</a></li>
            </ul>
        </div>
	</div>
	<script>
		function confirm1(){
			$.messager.confirm('注销', '确定退出么?', function(r){
				if (r){
					top.location='/edu/index.php/Home/Index/loginout'
				}
			});
		}
	</script>
	</body>
</html>