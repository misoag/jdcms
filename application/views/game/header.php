<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>ServerInfo</title>
<base href="<?php echo jd_baseurl_template()?>" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="cache-control" content="no-cache">
<meta http-equiv="expires" content="0">
<style type="text/css">
*{margin:0px;padding:0px;font-size:16px;font-family:"仿宋"}
a{text-decoration:none;color:blue;}
.header{margin-bottom:10px;padding:10px;background:#000;}
.header a{font-weight:bolder;color:#fff;font-size:20px;display:block;float:left;margin-right:20px;}
.container{padding:10px;}
li{padding:5px;}
li a:hover{color:red}
</style>
<link href="<?php echo jd_baseurl_admin()?>/ueditor/third-party/SyntaxHighlighter/shCoreDefault.css" rel="stylesheet" type="text/css" />
<script src="<?php echo jd_baseurl_admin()?>/ueditor/third-party/SyntaxHighlighter/shCore.js"></script>  
<script>SyntaxHighlighter.all();</script>
</head>
<body>
	<div class="header">
		<?php foreach (jd_category_list(1) as $row):?>
		 <a href="<?php echo jd_category_url($row)?>"><?php echo $row->title?></a>	
		<?php endforeach;?>
		<div style="clear:both"></div>
	</div>
	<div class="container">