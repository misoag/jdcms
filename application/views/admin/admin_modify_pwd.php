<?php include 'left.php';?>
<div style="padding:10px;">
	<div class="title">修改密码</div>
	<?php if(isset($info)):?>
	<div class="notice"><?php echo $info?></div>
	<?php endif;?>
	<div class="box span-9">
		<?php echo form_open("admin/modifyPassword")?>
			<table>
				<tr>
					<td><label for="oldpassword">原密码</label></td>
					<td><input type="password" class="text" id="oldpassword" name="oldpassword"></td>
				</tr>
				<tr>
					<td><label for="newpassword1">新密码</label></td>
					<td><input type="password" class="text" id="newpassword1" name="newpassword1"></td>
				</tr>
				<tr>
					<td><label for="newpassword">确认新密码</label></td>
					<td><input type="password" class="text" id="newpassword2" name="newpassword2"></td>
				</tr>
				<tr>
					<td></td>
					<td><input type="submit" value="修改密码" style="padding:5px;"></td>
				</tr>
			</table>
		<?php echo form_close()?>
	</div>
</div>
<?php include 'footer.php';?>