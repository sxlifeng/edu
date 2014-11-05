<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>学生选课信息</title>
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/default/easyui.css"/>
<link rel="stylesheet" type="text/css" href="/edu/Public/Js/easyui/themes/icon.css"/>
<link rel="stylesheet" type="text/css" href="/edu/Public/Css/my.css"/>
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/jquery.easyui.min.js"></script>
<script type="text/javascript" src="/edu/Public/Js/easyui/locale/easyui-lang-zh_CN.js"></script>
</head>
<body>
	<table id="select_course" class="easyui-datagrid" title="选课信息" style="width:100%;height:auto"
			data-options="
				iconCls: 'icon-edit',
				fitColumns:true,
				rownumbers:true,
				singleSelect: true,
				toolbar: '#toolbar',
				url: '/edu/index.php/Home/Student/selectedCourseJson',
				method: 'get'				
			">
		<thead>
			<tr>
				<th data-options="field:'id',align:'center',hidden:true">id</th>
				<th data-options="field:'couNum',align:'center',width:30">课程编号</th>
				<th data-options="field:'couName',align:'center',width:50">课程名称</th>
				<th data-options="field:'couDepart',align:'center',width:50">开课院系</th>
				<th data-options="field:'couHour',align:'center',width:30">学时</th>
				<th data-options="field:'couCredit',align:'center',width:30">学分</th>
				<th data-options="field:'isDegree',align:'center',width:30">是否学位课</th>
			</tr>
		</thead>
	</table>

	<div id="toolbar" style="height:auto">
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-add',plain:true" onclick="addCourse()">添加</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-edit',plain:true" onclick="editCourse()">修改</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" data-options="iconCls:'icon-remove',plain:true" onclick="delCourse()">删除</a>
	</div>
	
	<div id="dlg" class="easyui-dialog" style="width:400px;height:320px;padding:10px 20px" closed="true" buttons="#dlg-buttons">
		<div class="ftitle">课程信息</div>
		<form id="fm" method="post">
			<div class="fitem">
				<label>课程编号:</label>
				<select class="easyui-combogrid" style="width:163px" name="couNum" data-options="
			panelWidth: 280,
			idField: 'itemid',
			textField: 'productname',
			url: '',
			method: 'get',
			columns: [[
				{field:'itemid',title:'Item ID',width:80},
				{field:'productname',title:'Product',width:120},
				{field:'listprice',title:'List Price',width:80,align:'right'}				
			]],
			fitColumns: true
		">
	</select>
			</div>
			<div class="fitem">
				<label>课程名称:</label>
				<input name="couName" class="easyui-textbox" data-options="required:true" required="true"/>
			</div>
			<div class="fitem">
				<label>开课院系:</label>
				<input name="couDepart" class="easyui-textbox" required="true" />
			</div>
			<div class="fitem">
				<label>学时:</label>
				<input name="couHour" class="easyui-textbox" required="true" />
			</div>
			<div class="fitem">
				<label>学分:</label>
				<input name="couCredit" class="easyui-textbox" required="true"/>
			</div>
			<div class="fitem">
				<label>是否学位课:</label>
				<input name="isDegree" class="easyui-textbox" required="true" />
			</div>
		</form>
	</div>
	<div id="dlg-buttons">
		<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveCourse()" style="width:90px">保存</a>
		<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">取消</a>
	</div>
	
	<script type="text/javascript">
		var url;
		function addCourse(){
			$('#dlg').dialog('open').dialog('setTitle','添加选课信息');
			$('#fm').form('clear');
			url = '/edu/index.php/Home/Student/addCourse';
		}
		function editCourse(){
			var row = $('#select_course').datagrid('getSelected');
			if (row){
				$('#dlg').dialog('open').dialog('setTitle','修改选课信息');
				$('#fm').form('load',row);
				url = '/edu/index.php/Home/Student/updateCourse/id/'+row.id;
			}
		}
		function saveCourse(){
			$('#fm').form('submit',{
				url: url,
				onSubmit: function(){
					return $(this).form('validate');
				},
				success: function(result){
					var result = eval('('+result+')');
					if (result.errorMsg){
						$.messager.alert('错误信息',result.errorMsg,'error');
					} else {
						$('#dlg').dialog('close');		// close the dialog
						$.messager.show({
							title:'消息',
							msg:'保存成功'
						});
						$('#select_course').datagrid('reload');	// reload the user data
					}
				}
			});
		}
		function delCourse(){
			var row = $('#select_course').datagrid('getSelected');
			if (row){
				$.messager.confirm('确认消息','确定删除该选课信息么?',function(r){
					if (r){
						$.post('/edu/index.php/Home/Student/delCourse',{id:row.id},function(result){
							if (result.success){
								$('#select_course').datagrid('reload');	// reload the data
								$.messager.show({
									title:'消息',
									msg:'删除成功！',
									timeout:1500
								});
							} else {
								$.messager.alert('错误信息',result.errorMsg,'error');
							}
						},'json');
					}
				});
			}
		}
	</script>
</body>
</html>