<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>毕业设计管理</title>
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/edu/Public/Css/my.css">
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/locale/easyui-lang-zh_CN.js"></script>
</head>
<body id="gradu_project">
<form action="/edu/index.php/Home/Student/editGraduProject" name="form1" id="form1" method="post">
<table cellspacing="0" cellpadding="0" id="gradu_project_table">
	<tbody>		
		<tr class="rowodd">
			<td class="tdname">毕业设计题目：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="ProjectName" id="ProjectName" data-options="required:true,width:300" value="<?php echo ($graduProject['ProjectName']); ?>"/></td>			
		</tr>
		<tr class="roweven">
			<td class="tdname">毕业设计关键词：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="ProjectKey" data-options="required:true,width:300" value="<?php echo ($graduProject['ProjectKey']); ?>" /><div id='key_info'>多个关键词用分号隔开</div></td>			
		</tr>				
	</tbody>
</table>
<div class="submit_container1">
	<a href="javascript:void(0)" class="easyui-linkbutton submit_button" data-options="iconCls:'icon-ok',size:'large',onClick:function() {
																																	$('#form1').form('submit',{																															
																																		success:function(data){
																																			var data = eval('(' + data + ')');
																																		    if(data.code==0){
																																        		$.messager.show({title:'消息',msg:'信息保存成功！1秒后刷新页面',timeout:2000});
																																        		window.setTimeout('location.reload()',1000);
																																        	}else{
																																        		$.messager.alert('错误提示',data.message,'error');
																																        	}									           
																																	    }
																																	});
		  																														}">保存</a> 
</div>
</form>

</body>
</html>