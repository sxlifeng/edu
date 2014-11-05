<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>学籍信息</title>
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/edu/Public/Css/my.css">
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/locale/easyui-lang-zh_CN.js"></script>
</head>
<body id="register_info">
<form action="/edu/index.php/Home/Student/editRegisterInfo" name="form1" id="form1" method="post">
<table cellspacing="0" cellpadding="0" id="register_info_table">
	<tbody>
		<tr class='row_title'>
			<td class="colspan_title" colspan="4">当前学籍信息</td>
		</tr>
		<tr class="rowodd">
			<td class="tdname">学籍级别：</td>
			<td class="tdvalue"><input class="easyui-combobox" type="text" name="stuType" id="stuType"  data-options="required:true,editable:false,data:[{text:'工学硕士'},{text:'国际留学生'},{text:'博士'},{text:'博士后工作站'},{text:'工程硕士'}],valueField:'text',textField:'text',panelHeight:'auto'" value="<?php echo ($register['stuType']); ?>"/></td>
			<td class="tdname">年级：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="stuGrade" id="stuGrade" data-options="required:true,editable:false" value="<?php echo ($register['stuGrade']); ?>" /></td>
		</tr>
		<tr class="roweven">
			<td class="tdname">入学日期：</td>
			<td class="tdvalue"><input class="easyui-datebox" type="text" name="stuEnterDate" data-options="required:true,editable:false" value="<?php echo ($register['stuEnterDate']); ?>" /></td>
			<td class="tdname">专业：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="stuMajor" id="stuMajor" data-options="required:true" value="<?php echo ($register['stuMajor']); ?>" /></td>
		</tr>
		<tr class="rowodd">
			<td class="tdname">实习单位：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="stuCompany" id="stuCompany" value="<?php echo ($register['stuCompany']); ?>"/></td>
			<td class="tdname">导师姓名：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="stuTeacher" id="stuTeacher" value="<?php echo ($register['stuTeacher']); ?>" /></td>
		</tr>
		<tr class='row_title'>
			<td class="colspan_title" colspan="4">前置学籍信息</td>
		</tr>
		<tr class="rowodd">
			<td class="tdname">级别：</td>
			<td class="tdvalue">
				<input class="easyui-combobox" type="text" name="preDegreeGrade" id="preDegreeGrade" data-options="required:true,editable:false,data:[{text:'学士'},{text:'硕士'},{text:'博士'}],valueField:'text',textField:'text',panelHeight:'auto'" value="<?php echo ($register['preDegreeGrade']); ?>" />
			</td>
			<td class="tdname">类别：</td>
			<td class="tdvalue"><input class="easyui-combobox" type="text" name="preDegreeType"  data-options="required:true,editable:false,
			data:[{text:'01哲学'},{text:'02经济学'},{text:'03法学'},{text:'04教育学'},{text:'05 文学'},{text:'06历史学'},{text:'07理学'},{text:'08工学'},{text:'09农学'},{text:'10医学'},{text:'11军事学'},{text:'12管理学'}],
			valueField:'text',textField:'text',panelHeight:'auto'" value="<?php echo ($register['preDegreeType']); ?>"/></td>
		</tr>
		
		<tr class="roweven">
			<td class="tdname">授予单位：</td>
			<td class="tdvalue">
				<input class="easyui-textbox" type="text" name="preDegreeCollege" data-options="required:true" value="<?php echo ($register['preDegreeCollege']); ?>" />
			</td>
			<td class="tdname">授予日期：</td>
			<td class="tdvalue"><input class="easyui-datebox" type="text" name="preDegreeDate" data-options="required:true,editable:false"  value="<?php echo ($register['preDegreeDate']); ?>"/></td>
		</tr>
				
	</tbody>
</table>
<div class="submit_container">
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