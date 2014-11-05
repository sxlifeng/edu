<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/icon.css">
<link rel="stylesheet" type="text/css" href="/edu/Public/Css/my.css">
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/locale/easyui-lang-zh_CN.js"></script>
<script>
$(document).ready(
		function(){
			$('#stuCardType').combobox('select',<?php echo ($stuCardType); ?>);
			$('#stuSex').combobox('select',<?php echo ($stuSex); ?>);
			$('#stuPolitics').combobox('select',<?php echo ($stuPolitics); ?>);
			stuNation1=<?php echo ($stuNation); ?>;			
			stuProvince=<?php echo ($stuProvince); ?>;
			if(typeof(stuProvince)==="undefined")stuProvince='-1';
			stuCity=<?php echo ($stuCity); ?>;			
		}
		
	)
</script>
<title>学生信息</title>
</head>
<body id="stu_info">
<form action="/edu/index.php/Home/Student/updateStuInfo" name="form1" id="form1" enctype="multipart/form-data" method="post">
<table cellspacing="0" cellpadding="0" id="stu_info_table">
	<tbody>
		<tr class="rowodd">
			<td class="tdname">学号：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="stuNum" data-options="required:true,editable:false" value="<?php echo ($stuNum); ?>"/></td>
			<td class="tdname">姓名：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="stuName" data-options="required:true,editable:false" value="<?php echo ($stuName); ?>" /></td>
		</tr>
		<tr class="roweven">
			<td class="tdname">国籍：</td>
			<td class="tdvalue"><input class="easyui-validatebox  textbox" type="text" name="stuCitizen" data-options="required:true" value="<?php echo ($stuCitizen); ?>" /></td>
			<td class="tdname">民族：</td>
			<td class="tdvalue"><input class="easyui-combobox" type="text" name="stuNation" id="stuNation" data-options="required:true,editable:false,url:'/edu/Application/Home/Common/nation.json',method:'get',valueField:'code',textField:'nation',panelHeight:'200px',onLoadSuccess:function(){$(this).combobox('setValue',stuNation1);}"/></td>
		</tr>
		<tr class="rowodd">
			<td class="tdname">证件类型：</td>
			<td class="tdvalue">
				<input class="easyui-combobox" type="text" name="stuCardType" id="stuCardType" data-options="required:true,editable:false,data:[{code:'01',text:'居民身份证',selected:true},{code:'02',text:'护照'},{code:'03',text:'其他'}],valueField:'code',textField:'text',panelHeight:'auto'" />
			</td>
			<td class="tdname">证件号码：</td>
			<td class="tdvalue"><input class="easyui-validatebox  textbox" type="text" name="stuCardNum" data-options="required:true" value="<?php echo ($stuCardNum); ?>"/></td>
		</tr>
		
		<tr class="roweven">
			<td class="tdname">出生日期：</td>
			<td class="tdvalue">
				<input class="easyui-datebox" type="text" name="stuBirthday" data-options="requried:true,editable:false" value="<?php echo ($stuBirthday); ?>"/>
			</td>
			<td class="tdname">性别：</td>
			<td class="tdvalue"><input class="easyui-combobox" type="text" name="stuSex" id="stuSex" data-options="required:true,editable:false,data:[{code:'01',text:'男',selected:true},{code:'02',text:'女'}],valueField:'code',textField:'text',panelHeight:'auto'"/></td>
		</tr>
		
		<tr class="rowodd">
			<td class="tdname">政治面貌：</td>
			<td class="tdvalue">
				<input class="easyui-combobox" type="text" name="stuPolitics" id="stuPolitics" data-options="required:true,editable:false,data:[{code:'01',text:'中共党员',selected:true},{code:'02',text:'中共预备党员'},{code:'03',text:'共青团员'},{code:'04',text:'群众'},{code:'05',text:'其他'}],valueField:'code',textField:'text',panelHeight:'auto'"/>
			</td>
			<td class="tdname">宗教信仰：</td>
			<td class="tdvalue"><input class="easyui-validatebox  textbox" type="text" name="stuBelief" value="<?php echo ($stuBelief); ?>" /></td>
		</tr>
		
		<tr class="roweven">
			<td class="tdname">户口所在地：</td>
			<td class="tdvalue">
				<input id="pro" name="stuProvince" class="easyui-combobox" data-options=" 
						required:true,
						editable:false,
						width:'120px',   
				        valueField: 'code',    
				        textField: 'name',    
				        url: '/edu/index.php/Home/Student/getProvince',    
				        onSelect: function(rec){    
				            var url = '/edu/index.php/Home/Student/getCity?pid='+rec.code; 
				            $('#city').combobox('clear'),   
				            $('#city').combobox('reload', url);    
				        },
				        onLoadSuccess:function(){
				        $(this).combobox('select',stuProvince);
				        }" />   
				<input id="city" name="stuCity" class="easyui-combobox" data-options="required:true,editable:false,valueField:'code',textField:'name',width:'120px',onLoadSuccess:function(){$(this).combobox('select',stuCity);stuCity='-1';}" />
			</td>
			<td class="tdname">家庭住址：</td>
			<td class="tdvalue"><input class="easyui-textbox" type="text" name="stuAddress" data-options="width:'250px',required:true,missingMessage:'该输入项为必输项'" value="<?php echo ($stuAddress); ?>"/></td>
		</tr>
		
		<tr class="rowodd">
			<td class="tdname">联系电话：</td>
			<td class="tdvalue">
				<input class="easyui-validatebox  textbox" type="text" name="stuTel" data-options="required:true,validType:'length[11,11]'" value="<?php echo ($stuTel); ?>" maxlength="11" />
			</td>
			<td class="tdname">电子邮箱：</td>
			<td class="tdvalue">
				<input class="easyui-validatebox  textbox" type="text" name="stuEmail" value="<?php echo ($stuEmail); ?>" data-options="validType:'email'" />
			</td>
		</tr>
		
		<tr class="roweven">
			<td class="tdname">个人照片：</td>
			<td class="tdvalue" colspan="4" valign="middle">
				<img src="/edu/Public/Image/Upload/<?php echo ($stuPic); ?>" id="stu_img" />
				<div id="img_input_container"><input class="easyui-filebox" type="text" name="stuPic" id="stu_img_input" data-options="buttonText:'选择照片',height:'30px'"></div>		
			</td>
		</tr>	
	</tbody>
</table>
<div class="submit_container">
	<a href="javascript:void(0)" class="easyui-linkbutton submit_button" data-options="iconCls:'icon-ok',size:'large',onClick:function() {
																																	$('#form1').form('submit',{																															
																																		success:function(data){
																																			var data = eval('(' + data + ')');
																																			alert(data.message);
																																		    if(data.code==0){
																																        		location.reload();
																																        	}										           
																																	    }
																																	});
		  																														}">保存</a> 
</div>
</form>
</body>
</html>