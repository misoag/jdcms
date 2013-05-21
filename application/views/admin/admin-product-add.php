<?php include 'left.php';?>
<script type="text/javascript" src="uploadify/jquery.uploadify-3.1.min.js"></script>
<link href="uploadify/uploadify.css" rel="stylesheet" type="text/css" />
<div class="padding:10px;">
	<?php echo form_open_multipart("product/add/$cid")?>
	<table>
		<tr>
			<td><label>栏目：</label></td>
			<td>
				<select name="cid" style="padding:5px;width:200px;">
				<?php echo jd_category_select(2,$cid)?>
				</select>
			</td>
		</tr>
		<tr>
			<td><label>标题：</label></td>
			<td>
				<input  type="text" name="title"  style="width:300px;" />
				Alias：
				<input type="text" name="alias" style="width:100px;" />
				<span style="color:red">（非IT专业人士请无视！！！）</span>
			</td>
		</tr>
		<tr>
			<td><label>关键词：</label></td>
			<td><input  type="text" name="keywords"  style="width:300px;" /></td>
		</tr>
		<tr>
			<td><label>简介：</label></td>
			<td><textarea name="description" cols="70" rows="3" ></textarea></td>
		</tr>
		<tr>
			<td><label class="control-label span1">图片：</label></td>
			<td><input type="file" name="uploadfile" /></td>
		</tr>
		<tr>
			<td><label>内容：</label></td>
			<td><textarea id="content" name="content" style="width: 860px;"></textarea></td>
		</tr>
		<tr>
			<td>图片</td>
			<td><input type="button" name="images" id="images" /></td>
		</tr>
		<tr>
			<td></td>
			<td>
				<p id="image_container"></p>
			</td>
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
				<input type="hidden" name="tmp_aid" value="<?php echo $image_aid = rand(-1000000,-1)?>"/>
				<input type="submit" value="保存" class="btn" />
			</td>
		</tr>
	</table>
<?php echo form_close()?>
</div>
<script type="text/javascript">
$(function(){
	$('.product-img').dblclick(function(){
		if(confirm('你确定要删除吗？')){
			var id = $(this).attr('delete');
			$.post("<?php echo site_url('product/ajax_delete_image/')?>"+"/"+id,function(data){
				if(data){
					location.href='<?php echo $_SERVER['REQUEST_URI']?>';
				}
			});
		}
	});
});

$("#images").uploadify({
    width         : 120,
    height        : 30,
    fileTypeExts  : '*.gif; *.jpg; *.png; *.jpeg',
    swf           : 'uploadify/uploadify.swf',
    uploader      : '<?php echo site_url("product/ajax_upload_image/$image_aid")?>',
    formData      : {},
    onUploadSuccess : function(file, data, response) {
        if(response){
        	data = eval("("+data+")");
        	$("#image_container").append('<img src="'+data.file_name+'" class="product-img" style="width: 100px; height: 100px; border: 1px solid orange;"/>');
        }
    },
    onQueueComplete: function(queueData) {
    	lisenter();
    }
});
lisenter();
</script>
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
