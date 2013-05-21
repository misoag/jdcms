<?php include 'left.php';?>
<div style="padding:10px;">
<div class="title">分类管理</div>
<table style="width:100%">
	<thead>
		<tr>
			<th width="20">ID</th>
			<th>栏目名称</th>
			<th width="80">排序</th>
			<th width="100">栏目别名</th>
			<th width="120">文档数量</th>
			<th width="40">隐藏</th>
			<th>操作</th>
		</tr>
	</thead>
	<tbody>
		<?php deep_category(0);?>
	</tbody>
</table>
<?php include 'footer.php';?>

<script type="text/javascript">
$(function(){
	/*修改栏目排序*/
	$("input[name='sort']").focus(function(){$(this).val('')});
	$("input[name='sort']").focusout(function(){
		var id = $(this).attr('id');
		var sort = $(this).val();
		var old_sort = $(this).attr('title');
		if(sort!='' && sort != old_sort){
			$.post("<?php echo site_url('category/ajax_update_sort')?>", {
				'id':id.substr(1),
				'sort':sort
			},function(data){
				if(data != sort){$('#'+id).val(data);}
				$('#'+id).attr('title',data);
				$('#'+id).fadeTo("fast",0.1, function(){$(this).fadeTo("fast", 1);});
			});
		}else{
			$(this).val(old_sort);
		}
	});
	/*修改栏目别名*/
	$("input[name='alias']").focus(function(){$(this).val('')});
	$("input[name='alias']").focusout(function(){
		var id = $(this).attr('id');
		var alias = $(this).val();
		var old_alias = $(this).attr('title');
		if(alias!='' && alias != old_alias){
			$.post("<?php echo site_url('category/ajax_update_alias')?>", {
				'id':id.substr(1),
				'alias':alias
			},function(data){
				if(data != alias){$('#'+id).val(data);}
				$('#'+id).attr('title',data);
				$('#'+id).fadeTo("fast",0.1, function(){$(this).fadeTo("fast", 1);});
			});
		}else{
			$(this).val(old_alias);
		}
	});
});
</script>
	<?php include 'footer.php';?>
<!-- 定义一个递归函数 -->
	<?php function deep_category($pid){?>
	<?php static $deep = 1;?>
<!-- 递归函数 -->
	<?php foreach(jd_category_list($pid) as $row):?>
	<?php $child_count = jd_category_count($row->id)?>
<tr>
	<td><?php echo $row->id?></td>
	<td>
		<!-- 前缀 -->
		<?php echo _category_prefix($deep);?>
		<!-- 栏目名称 -->
		<?php if($child_count>0 || $deep==1):?>
			<strong><?php echo $row->title?></strong>&nbsp; 
		<?php else:?> 
			<?php echo $row->title?>
		<?php endif;?>
	</td>
	<td>
		<?php if($row->pid !=0):?> 
			<input type="text" class="text" style="width:50px;" value="<?php echo $row->sort?>" id='s<?php echo $row->id?>' name="sort" title="<?php echo $row->sort?>" /> 
		<?php endif;?>
	</td>
	<td>
		<?php if($row->pid !=0):?>
			<input type="text" class="text" style="width:100px;" value="<?php echo empty($row->alias)?"":"$row->alias"?>" id='a<?php echo $row->id?>' name="alias" title="<?php echo empty($row->alias)?"":"$row->alias"?>" /> 
		<?php endif;?>
	</td>
	<td>
		<font color="#0033FF">
			<?php 
				if($row->model ==1){
					echo jd_article_count($row->id);
				}else{
					echo jd_product_count($row->id);
				}
			?>
		</font>&nbsp;篇
	</td>
	<td>
		<?php if($row->display):?> 显示 <?php else:?> 
			<font color="red">隐藏</font>
		<?php endif;?>
	</td>
	<td>
		<a href="<?php echo site_url("category/add/$row->id")?>" class="btn">添加子分类</a>&nbsp;&nbsp; 
		<?php if($row->pid !=0):?> 
			<a href="<?php echo site_url("category/update/$row->id")?>" class="btn">修改</a>&nbsp;&nbsp;
			<a href="<?php echo site_url("category/delete/$row->id")?>" class="btn" onclick="javascript:return confirm('确定删除吗？');">删除</a> 
		<?php endif;?>
	</td>
</tr>
<?php if($child_count>0){$deep++;deep_category($row->id);}?>
<?php endforeach;?>
	<!-- 递归函数结束 -->
	<?php $deep--;?>
	<?php }?>
	<!-- 生成前缀 -->
	<?php
	function _category_prefix($deep){
		$prefix = '';
		for ($i = 1;$i<$deep;$i++){
			$prefix .='&nbsp;&nbsp;&nbsp;&nbsp;';
		}
		return $prefix.'+';
	}
	?>
</div>