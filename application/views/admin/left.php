<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<base href="<?php echo jd_baseurl_admin()?>">
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title>后台管理</title>
<style type="text/css">
*{margin:0px;padding:0px;font-size:12px;}
#left{float:left;background:#f0f0f0;width:130px;height:500px;border-right:1px solid #ccc;}
#right{margin-left:130px;padding:5px;}
#left dl{margin:5px;border-bottom:1px solid #ccc;background:#fff;}
#left dt{background:#ebfaff;border:1px solid #ccc;padding:8px 6px;text-indent:10px;font-weight:bolder;font-size:14px;color:#333;}
#left dd{margin:0px;text-indent:1.5em;border-left:1px solid #ccc;border-right:1px solid #ccc;}
#left dd a{text-decoration:none;display:block;font-size:14px;color:#333;padding:5px;}
#left dd a:hover{background:#e1eef6;color:#0068c4;}


table{border-collapse:collapse;}
th,td{padding:5px;border:1px solid #003366;text-align:left;background:#fff;}
th{background:#4d90fe;color:#fff;}
input,textarea{padding:3px;}
.title{font-size:18px;font-family:微软雅黑;border-bottom:2px solid #ccc;margin-bottom:10px;}
.btn{overflow: visible; width: auto;background:#4D90FE;border:1px solid #003366;color:white;font-family:Arial,sans-serif,Tahoma;font-size:12px;height:25px;line-height:15px;cursor:pointer;text-decoration:none;padding:3px;}
a.btn:hover{color:#fff;}

.pagination li{list-style:none;display:block;float:left;border:1px solid #336699;margin:2px;}
.pagination li.active{background:#ccc;}
.pagination a{display:block;padding:0px 8px;height:25px;text-align:center;line-height:25px;text-decoration:none;color:blue;}

.table-form th,.table-form td{padding:5px;}
</style>
<script type="text/javascript" src="uploadify/jquery.js"></script>
<script type="text/javascript">
$(function(){$("#left").height($(document).height());});
$(window).scroll(function(){$("#left").height($(document).height());});
$(window).resize(function(){$("#left").height($(document).height());});
</script>
</head>
<body>
	<div id="left">
		<dl>
			<dt>网站内容</dt>
			<dd><a href="<?php echo site_url('article')?>">文章管理</a></dd>
			<dd><a href="<?php echo site_url('product')?>">产品管理</a></dd>
			<dt>网站配置</dt>
			<dd><a href="<?php echo site_url("category")?>">分类管理</a></dd>
			<dd><a href="<?php echo site_url('sysconfig')?>">系统配置</a></dd>
			<dd><a href="<?php echo site_url("admin/modifyPassword")?>">网站密码</a></dd>
			<dt>系统管理</dt>
			<dd><a href="<?php echo site_url("/")?>" target="_blank">打开网站</a></dd>
			<dd><a href="<?php echo site_url("admin/logout")?>">退出系统</a></dd>
		</dl>
	</div>
	<div id="right">