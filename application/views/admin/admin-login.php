<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>登陆</title>
<style type="text/css">
	*{margin:0px;padding:0px;}
	.login{border:2px solid #ccc;width:300px;margin:150px auto;padding:5px;}
	.login p{margin:5px;}
	.login label{width:150px;display:block;padding:3px;}
	.login input{padding:3px;}
</style>
</head>
<body>
	<div class="login">
		<?php echo form_open("admin/login")?>
			<p>
				<label>账号:</label><input name="username" type="text"/>
			</p>
			<p>
				<label>密码:</label><input name="password" type="password"/>
			</p>
			<p>
				<input type="submit" value="登录">
			</p>
		<?php echo form_close()?>
	</div>
</body>
</html>

