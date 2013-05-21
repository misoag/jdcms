<?php include 'left.php';?>
<?php $parent = jd_category($pid);?>
<?php echo form_open("category/add/$pid",array('class'=>'form-horizontal'))?>
<table class="table-form">
  <tr>
    <td>栏目名称：</td>
    <td><input type="text" name="title" /></td>
  </tr>
  <tr>
  	<td>关键词：</td>
  	<td><input type="text" name="keywords" /></td>
  </tr>
  <tr>
  	<td>栏目描述：</td>
  	<td><textarea name="description" cols="70" rows="3"></textarea></td>
  </tr>
  <tr>
  	<td>是否隐藏：</td>
  	<td><input type="radio" name="display" value="1" checked='checked' />显示<input type="radio" name="display" value="0" />隐藏</td>
  </tr>
  <tr>
  	<td>是否封面：</td>
  	<td><input type="checkbox" name="is_cover" value="1" />是</td>
  </tr>
  <tr>
  	<td>封面模板：</td>
  	<td><input type="text" name="template_index" value="<?php echo $parent->template_index?>" /></td>
  </tr>
  <tr>
  	<td>列表模板：</td>
  	<td><input type="text" name="template_list" value="<?php echo $parent->template_list?>" /></td>
  </tr>
  <tr>
  	<td>内容模板：</td>
  	<td><input type="text" name="template_content" value="<?php echo $parent->template_content?>" /></td>
  </tr>
  <tr>
  	<td></td>
  	<td><button type="submit" class="btn">保存</button></td>
  </tr>
</table>
<input type="hidden" name="pid" value="<?php echo $pid?>">
<input type="hidden" name="model" value="<?php echo $parent->model?>">
<?php echo form_close()?>
<?php include 'footer.php';?>