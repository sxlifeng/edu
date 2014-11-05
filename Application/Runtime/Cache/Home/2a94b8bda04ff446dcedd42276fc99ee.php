<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>教务网络管理系统</title>
    <link href="/edu/Public/Css/index_style.css" rel="stylesheet" type="text/css" />
    <script type="text/javascript" src="/edu/Public/Js/easyui/jquery.min.js"></script>
    <script type="text/javascript">
		$(document).ready(function(){
			$("#userNum").focus();
			$("#submit").click(function(){
				if($.trim($("#userNum").val())==null||$.trim($("#userNum").val())==""){
					$("#warningName").css("visibility","visible");
					$("#userNum").val("");
					$("#userNum").focus();
					return false;
				}else{
					$("#warningName").css("visibility","hidden");
					if($.trim($("#userPwd").val())==null||$.trim($("#userPwd").val())==""){
						$("#warningPwd").css("visibility","visible");
						$("#userPwd").val("");
						$("#userPwd").focus();
						return false;
					}else{
						$("#warningPwd").css("visibility","hidden");
						return true;
					}
				}
			}
			)
		}
		)
	</script>
</head>
<body>
	<form name="form1" id="form1" method="post" action="/edu/index.php/Home/Index/checkLogin" target="_self">
        <div id="num1">
            <div id="middle">
                <div id="middle_top"></div>
                <div id="middle_middle">
                    <div id="middle_left"></div>
                    <div id="middle_center">
                        <div class="clear"></div>
                        <div id="middle_center_content">
                            <ul>
                                <li class="first"><img src="/edu/Public/Image/login/user.gif" /></li>
                                <li class="second">账号</li>
                                <li class="third"><input type="text" name="userNum" id="userNum"></li>
                                <li class="forth" id="warningName">请输入账号<img src="/edu/Public/Image/login/warning.png" title="请输入账号" /></li>
                            </ul>
                            <ul>
                                <li class="first"><img src="/edu/Public/Image/login/password.gif" /></li>
                                <li class="second">密码</li>
                                <li class="third"><input type="password" name="userPwd" id="userPwd" ></li>
                                <li class="forth" id="warningPwd">请输入密码<img src="/edu/Public/Image/login/warning.png" title="请输入密码" /></li>
                            </ul>
                            <ul>
                                <li class="first">&nbsp;</li>
                                <li class="second">&nbsp;</li>
                                <li id="sub_li"><input name="submit1" id="submit" type="image" src="/edu/Public/Image/login/login.gif" alt="登录系统" style="width:95px; height:34px; border:none; margin-top:10px;"/></li>
                                <li id="errorInfo"><?php echo ($errInfo); ?></li>
                            </ul>
                        </div>
                    </div>
                    <div id="middle_right"></div>
                    <div class="clear"></div>
                </div>
                <div id="middle_bottom">版权所有©2014 电信科学技术研究院</div>
            </div>
        </div>
    </form>
</body>
</html>