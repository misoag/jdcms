<!DOCTYPE html>
<html lang="zh">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo jd_sysconfig('sy_webtitle')?></title>
<base href="<?php echo jd_baseurl_template()?>" />
<meta name="keywords" content="<?php echo jd_sysconfig('sy_keywords')?>" />
<meta name="description" content="<?php echo jd_sysconfig('sy_description')?>" />
<style type="text/css">
@font-face {
	font-family: gothic;
	font-style: normal;
	src: url(font/GOTHICBI_0.TTF) format('truetype')
}

* {
	margin: 0px;
	padding: 0px;
	font-size: 12px;
	font-family: "gothic";
}

a img {
	border: none;
}

.menu {
	display: block;
	float: left;
	margin-top: 50px;
	margin-left: 200px;
}

.menu li {
	list-style: none;
	display: block;
	float: left;
	margin-left: 20px;
}

.down_link {
	background: url(images/down_link.png);
	width: 147px;
	height: 35px;
	display: block;
	position: absolute;
	left: 520px;
	top: 300px;
}

.down_link:hover {
	background: url(images/down_link_hover.png);
}

.menu_home {
	background: url(images/menu_home.png);
	display: block;
	height: 34px;
	width: 83px;
}

.menu_home:hover {
	background: url(images/menu_home_hover.png);
}

.menu_products {
	background: url(images/menu_products.png);
	display: block;
	height: 34px;
	width: 205px;
}

.menu_products:hover {
	background: url(images/menu_products_hover.png);
}

.menu_help {
	background: url(images/menu_help.png);
	display: block;
	height: 34px;
	width: 118px;
}

.menu_help:hover {
	background: url(images/menu_help_hover.png);
}

.menu_home_active {
	background: url(images/menu_home_hover.png);
}

.menu_products_active {
	background: url(images/menu_products_hover.png);
}

.menu_help_active {
	background: url(images/menu_help_hover.png);
}

.footer_link {
	display: block;
}

.footer_link li {
	list-style: none;
	display: block;
	float: left;
}

.copyright {
	width: 1000px;
	margin: 0 auto;
	font-size: 12px;
	line-height: 18px;
	font-family: 微软雅黑;
	color: #fff;
}
</style>
</head>
<body>
<?php function menu_products(){
	if(strpos($_SERVER['REQUEST_URI'],'1849')){
		echo "menu_products_active";
	}
	if(strpos($_SERVER['REQUEST_URI'],'1850')){
		echo "menu_products_active";
	}
	if(strpos($_SERVER['REQUEST_URI'],'1851')){
		echo "menu_products_active";
	}
	if(strpos($_SERVER['REQUEST_URI'],'1853')){
		echo "menu_products_active";
	}
}
function menu_help(){
	if(strpos($_SERVER['REQUEST_URI'],'1852')){
		echo "menu_help_active";
	}
}

function menu_home(){
	if(!strpos($_SERVER['REQUEST_URI'],'/html/site')){
		echo "menu_home_active";
	}
}

?>
<div style="background: url('images/header_back.png') repeat-x; height: 115px;">
<div style="width: 1000px; height: 115px; margin: 0px auto;"><img src="images/logo.png" style="display: block; float: left;" /> <!--menu-->
<ul class="menu">
	<li><a href="<?php echo site_url('/')?>" class="menu_home <?php menu_home()?>"> </a></li>
	<li><a href="<?php echo jd_archive_url(13,1850)?>" class="menu_products <?php menu_products()?>"> </a></li>
	<li><a href="<?php echo jd_archive_url(13,1852)?>" class="menu_help <?php menu_help()?>"> </a></li>
</ul>
<!--/end menu--></div>
</div>