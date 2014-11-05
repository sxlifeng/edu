<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>党员信息</title>
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/edu/Public/Css/my.css">
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/locale/easyui-lang-zh_CN.js"></script>
<script type="text/javascript">
$(document).ready(
	function(){
		$('#joinDate').datebox({
			onSelect: function(date){
		        var selectedDate=(date.getFullYear()+1)+"-"+(date.getMonth()+1)+"-"+date.getDate();
		        $('#confirmDate').datebox('setValue',selectedDate);
		    }
		})
});
</script>
</head>
<body id="communist_info">
<form action="/edu/index.php/Home/Student/editCommunistInfo" name="form1" id="form1" method="post">
<table cellspacing="0" cellpadding="0" id="communist_info_table">
	<tbody>
		<tr class='row_title'>
			<td class="colspan_title" colspan="4">研一时填写</td>
		</tr>
		<tr class="rowodd">
			<td class="tdname">入党日期：</td>
			<td class="tdvalue"><input class="easyui-datebox" type="text" name="joinDate" id="joinDate" data-options="required:true,editable:false" value="<?php echo ($communist['joinDate']); ?>"/></td>
			<td class="tdname">转正日期：</td>
			<td class="tdvalue"><input class="easyui-datebox" type="text" name="confirmDate" id="confirmDate" data-options="required:true,editable:false" value="<?php echo ($communist['confirmDate']); ?>" /></td>
		</tr>
		<tr class="roweven">
			<td class="tdname">党费交至：</td>
			<td class="tdvalue"><input class="easyui-datebox" type="text" name="duesDateBegin" data-options="required:true,editable:false" value="<?php echo ($communist['duesDateBegin']); ?>" /></td>
			<td class="tdname"></td>
			<td class="tdvalue"><input type='hidden' name='id' value="<?php echo ($communist['id']); ?>"/></td>
		</tr>
		<tr class='row_title'>
			<td class="colspan_title" colspan="4">研二时填写(用于转出党组织关系)</td>
		</tr>
		<tr class="rowodd">
			<td class="tdname">接收单位：</td>
			<td class="tdvalue">
				<input class="easyui-textbox" type="text" name="getCompany" id="getCompany" value="<?php echo ($communist['getCompany']); ?>" />
			</td>
			<td class="tdname">单位地址：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="comAddress" data-options="width:'250px'" value="<?php echo ($communist['comAddress']); ?>"/></td>
		</tr>
		
		<tr class="roweven">
			<td class="tdname">单位邮编：</td>
			<td class="tdvalue">
				<input class="easyui-numberbox" type="text" name="comZipcode" value="<?php echo ($communist['comZipcode']); ?>" />
			</td>
			<td class="tdname">联系人：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="comPersonName"  value="<?php echo ($communist['comPersonName']); ?>"/></td>
		</tr>
		
		<tr class="rowodd">
			<td class="tdname">联系人电话：</td>
			<td class="tdvalue">
				<input class="easyui-validatebox  textbox" type="text" name="comPersonTel" value="<?php echo ($communist['comPersonTel']); ?>" />
			</td>
			<td class="tdname">党费交至：</td>
			<td class="tdvalue"><input class="easyui-datebox" type="text" name="duesDateEnd" value="<?php echo ($communist['duesDateEnd']); ?>"  data-options="editable:false" /></td>
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