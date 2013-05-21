<?php include 'left.php';?>
<div style="padding:10px;">
	<div class="title">系统配置</div>

<?php echo form_open('sysconfig/save',array('class'=>'form-horizontal'))?>
<table>
	<?php foreach($rows as $row):?>
	<tr>
		<td><label class="control-label"><?php echo $row->alias?>：</label></td>
		<td><input type="text" name="<?php echo $row->name?>" value="<?php echo $row->value?>" style="width:250px;" /> <?php echo $row->name; ?></td>
	</tr>
	<?php endforeach;?>
	<tr>
		<td></td>
		<td><button type="submit" class="btn">保&nbsp;存</button></td>
	</tr>
</table>
<?php echo form_close()?>
</div>
<?php include 'footer.php';?>