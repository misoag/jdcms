<?php include 'left.php';?>
<div style="padding:10px;">
	<div class="title">产品管理</div>
	<?php echo form_open('product/index',array('method'=>'get','class'=>'form-inline'))?> 
		<a href="<?php echo site_url("product/add/$cid")?>" class="btn btn-success">添加产品</a> 
		<select name="cid" style="padding:3px;min-width:150px;">
		<?php echo jd_category_select(2,$cid)?>
		</select> 
		<input type="submit" value="查询" class="btn btn-primary" /> 
	<?php echo form_close()?>
	<br/>
	<?php if(count($rows) == 0):?>
		<p style="font-size:16px;color:red;margin:10px 0px;">没有找到内容</p>
	<?php else:?>
		<table style="width:100%;">
			<thead>
				<tr>
					<th width="20">ID</th>
					<th width="100">分类</th>
					<th>标题</th>
					<th width="60">排序</th>
					<th width="120">发表时间</th>
					<th width="80">操作</th>
				</tr>
			</thead>
		<?php foreach ($rows as $row):?>
			<tr>
				<td><?php echo $row->id?></td>
				<td><?php 
				$category = jd_category($row->cid);
				echo "[$category->id]";
				echo $category->title;
				?></td>
				<td>
				<?php if(!empty($row->preimg)):?>
					<span style="color:red;">[图]</span>
				<?php endif;?>
				<a href="<?php echo jd_product_url($row)?>" target="_blank" style="text-decoration:none;color:blue;">
					<?php echo $row->title?>
				</a>
					<?php if(!empty($row->alias)){echo "[$row->alias]";}?>
				</td>
				<td><input type="text" name="sort" style="width:50px;" id='<?php echo $row->id?>' title="<?php echo $row->sort?>" value="<?php echo $row->sort?>"/></td>	
				<td><?php echo $row->createtime?></td>
				<td>
					<a href="<?php echo site_url("product/update/{$row->cid}/{$row->id}")?>" class="btn btn-info">修改</a>&nbsp; 
					<a href="<?php echo site_url("product/delete/{$row->cid}/{$row->id}")?>" class="btn btn-danger" onclick="javascript:return confirm('确定删除吗？');">删除</a>
				</td>
			</tr>
			<?php endforeach;?>
		</table>
		<div class="pagination">
		<?php echo jd_pagination("product/index/$cid/",$count,$limit,4)?>
		</div>
		<br/><br/> 
	<?php endif;?>
	
</div>
<script type="text/javascript">
<!--
$("input[name='sort']").focus(function(){$(this).val('')});
$("input[name='sort']").focusout(function(){
	var id = $(this).attr('id');
	var sort = $(this).val();
	var old_sort = $(this).attr('title');
	if(sort!='' && sort != old_sort){
		$.post(
			'<?php echo site_url('product/ajax_update_sort')?>',
			{"id":id,"sort":sort},
			function(data){
				if(data != sort){$('#'+id).val(data);}
				$('#'+id).attr('title',data);
				$('#'+id).fadeTo("fast",0.1, function(){$(this).fadeTo("fast", 1);});
				location.reload();
			});
	}else{
		$(this).val(old_sort);
	}
});
//-->
</script>
<?php include 'footer.php';?>
