<?php include 'left.php';?>
<div style="padding:10px;">
<?php echo form_open_multipart("article/update/{$archive->cid}/{$archive->id}");?>
<table>
	<tr>
		<td><label>栏目：</label></td>
		<td>
			<select name="cid" style="padding:5px;width:200px;">
				<?php echo jd_category_select(1,$archive->cid)?>
			</select>
		</td>
	</tr>
	<tr>
		<td><label>标题：</label></td>
		<td>
			<input type="text" name="title" value="<?php echo $archive->title?>" style="width:300px;" />
			Alias：
			<input class="input-xlarge" type="text" name="alias" value="<?php echo $archive->alias?>" style="width:100px;" />
			<span style="color:red">（非IT专业人士请无视！！！）</span>
			<input type="checkbox" name="visible" value="1" <?php if($archive->visible):?>checked="checked"<?php endif;?>>&nbsp;隐藏
		</td>
	</tr>
	<tr>
		<td><label>关键词：</label></td>
		<td><input type="text" name="keywords" value="<?php echo $archive->keywords?>" style="width:300px;" /></td>
	</tr>
	<tr>
		<td><label class="control-label span1">图片：</label></td>
		<td>
			<input type="file" name="uploadfile" />
			<input type="hidden" name="preimg" value="<?php echo $archive->preimg?>"/>
			<?php if(!empty($archive->preimg)):?>
			<a href="<?php echo $archive->preimg?>" target="_blank">
				<img alt="" src="uploadify/img.png" style="height:20px;display:block;border:2px solid blue;float:left;">
			</a>
			<?php endif;?>
		</td>
	</tr>
	<tr>
		<td><label>内容：</label></td>
		<td><textarea id="content" name="content" style="width: 860px;"><?php echo $archive->content?></textarea></td>
	</tr>
	<tr>
		<td><label>模板：</label></td>
		<td>
			<input type="text" name="template" value="<?php echo $archive->template ?>" style="width:200px;" />
			<span style="color:red">（非IT专业人士请默默走开！！！）</span>
		</td>
	</tr>
	<tr>
		<td>
			
		</td>
		<td><input type="submit" value="保存" class="btn" /></td>
	</tr>
</table>
<?php echo form_close()?> 
</div>
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
