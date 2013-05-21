<?php include 'left.php';?>
<div style="padding:10px;">
	<?php echo form_open_multipart("article/add/{$cid}")?>
	<table>
		<tr>
			<td><label>栏目：</label></td>
			<td>
				<select name="cid" style="padding:5px;width:200px;">
				<?php echo jd_category_select(1,$cid)?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label>标题：</label></td>
			<td>
				<input type="text" name="title" style="width:300px;" />
				Alias：
				<input type="text" name="alias" style="width:100px;" />
				<span style="color:red">（非IT专业人士请无视！！！）</span>
				<input type="checkbox" name="visible" value="1">&nbsp;隐藏
			</td>
		</tr>
		<tr>
			<td><label>关键词：</label></td>
			<td><input type="text" name="keywords" style="width:300px;" /></td>
		</tr>
		<tr>
			<td><label>描述：</label></td>
			<td><textarea name="description" cols="70" rows="3" class="input-xxlarge"></textarea></td>
		</tr>
		<tr>
			<td><label>图片：</label></td>
			<td><input type="file" name="uploadfile" /></td>
		</tr>
		<tr>
			<td><label>内容：</label></td>
			<td><textarea id="content" name="content" style="width: 860px;" class="input-xxlarge"></textarea></td>
		</tr>
		<tr>
			<td><label>模板：</label></td>
			<td>
				<input type="text" name="template" style="width:200px;" />
				<span style="color:red">（非IT专业人士请默默走开！！！）</span>
			</td>
		</tr>
		<tr>
			<td></td>
			<td>
			<input type="hidden" name="author" value="管理员"/>
			<input type="submit" value="保存" class="btn" /></td>
		</tr>
	</table>
<?php echo form_close()?></div>
<script type="text/javascript">
window.UEDITOR_HOME_URL = "<?php echo base_url("application/views/admin/ueditor/").'/';?>";
</script>
<script type="text/javascript" src="ueditor/editor_config.js"></script>
<script type="text/javascript" src="ueditor/editor_all_min.js"></script>
<link rel="stylesheet" href="ueditor/themes/default/ueditor.css" />
<script type="text/javascript">
    var editor = new UE.ui.Editor();
    editor.render('content');
</script>
<?php include 'footer.php';?>
