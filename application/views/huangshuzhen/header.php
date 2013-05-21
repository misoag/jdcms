<!DOCTYPE html>
<html lang="zh">
  <head>
    <meta charset="utf-8">
    <base href="<?php echo jd_baseurl_template()?>">
    <title><?php echo jd_web_title()?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <style>
      	body { padding-top: 60px; padding-bottom: 40px;background:url(http://static.duoshuo.com/images/tile-light.png); }
        .box{ margin: 0 auto 20px; background-color: #fff; border: 1px solid #e5e5e5;-webkit-border-radius: 5px;-moz-border-radius: 5px; border-radius: 5px;-webkit-box-shadow: 0 1px 2px rgba(0,0,0,.05); -moz-box-shadow: 0 1px 2px rgba(0,0,0,.05);  box-shadow: 0 1px 2px rgba(0,0,0,.05);}
        .box h4{border-bottom:1px solid #eee;padding:5px 0px 10px 20px;font-family:微软雅黑;}
        .box p{padding:0px 20px;font-size:14px;color:#666;}
     	.box ul{ list-style: none; margin: 0;padding:0px 20px 20px 20px; }
     	.box li{margin-bottom:5px;font-size:12px;}
     	.authorinfo span{margin:3px;}
    </style>
    <!-- 
    <link href="bootstrap/css/bootstrap-responsive.css" rel="stylesheet">
     -->
    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="bootstrap/js/html5shiv.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="<?php echo base_url()?>"><b>Huangshuzhen</b></a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li <?php echo !isset($category)?'class="active"':'';?>><a href="<?php echo base_url()?>">Home</a></li>
              <?php foreach (jd_category_list('article') as $row):?>
              <?php if($row->display):?>
              	<?php 
              		if(isset($category) && $category == $row){
              			$active = "class=\"active\"";
              		}else{
              			$active = "";
              		}
              	?>
              <li <?php echo $active?> ><a href="<?php echo jd_category_url($row)?>"><?php echo $row->title?></a></li>
              <?php endif;?>
              <?php endforeach;;?>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>