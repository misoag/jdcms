<?php include 'left.php';?>
<?php echo form_open("category/update/{$category->id}",array('class'=>'form-horizontal'))?>
<table class="table-form">
  <tr>
    <td>栏目名称：</td>
    <td><input type="text" name="title" value="<?php echo $category->title?>" /></td>
  </tr>
  <tr>
    <td>关键词：</td>
    <td><input type="text" name="keywords" value="<?php echo $category->keywords?>" /></td>
  </tr>
  <tr>
    <td>描述：</td>
    <td><textarea name="description" cols="70" rows="3"><?php echo $category->description?></textarea></td>
  </tr>
  <tr>
    <td>是否隐藏：</td>
    <td><input type="radio" name="display" value="1" <?php if($category->display==1):?> checked='checked' <?php endif;?> /> 显示<input type="radio" name="display" value="0" <?php if($category->display==0):?> checked='checked' <?php endif;?> /> 隐藏</td>
  </tr>
  <tr>
    <td>是否封面：</td>
    <td><input type="checkbox" name="is_cover" value="1" <?php if($category->is_cover):?> checked='checked' <?php endif;?> />是</td>
  </tr>
  <tr>
    <td>封面模板：</td>
    <td><input type="text" name="template_index" value="<?php echo $category->template_index?>" /> </td>
  </tr>
  <tr>
    <td>列表模板：</td>
    <td><input type="text" name="template_list" value="<?php echo $category->template_list?>" /></td>
  </tr>
  <tr>
    <td>内容模板：</td>
    <td><input type="text" name="template_content" value="<?php echo $category->template_content?>" /></td>
  </tr>
  <tr>
    <td></td>
    <td><input type="hidden" name="id" value="<?php echo $category->id?>" /> <input class="btn" type="submit" value="&nbsp;保 存&nbsp;" /></td>
  </tr>
</table>
<?php echo form_close()?>
<?php include 'footer.php';?>