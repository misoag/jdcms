<?php include 'header.php';?>
<style type="text/css">
    .left{width:175px;float:left;margin-left:10px;}
    .left li{list-style:none;display:block;margin-bottom:10px;}
    .left .left_aboutus{display:block;background:url(images/left_aboutus_hover.png);width:175px;height:49px;}
    .left .left_aboutus:hover{background:url(images/left_aboutus.png);}
    .left .left_help{display:block;background:url(images/left_help_hover.png);width:175px;height:49px;}
    .left .left_help:hover{background:url(images/left_help.png);}
    .left .left_feedback{display:block;background:url(images/left_feedback_hover.png);width:175px;height:49px;}
    .left .left_feedback:hover{background:url(images/left_feedback.png);}
    .left .left_exceptions{display:block;background:url(images/left_exceptions_hover.png);width:175px;height:49px;}
    .left .left_exceptions:hover{background:url(images/left_exceptions.png);}
    
    .left_aboutus_active{background:url(images/left_aboutus.png);}
    .left_help_active{background:url(images/left_help.png);}
    .left_feedback_active{background:url(images/left_feedback.png);}
    .left_exceptions_active{background:url(images/left_exceptions.png);}
</style>
<?php 
function left_aboutus_active(){
	if(strpos($_SERVER['REQUEST_URI'],'1849')){
		echo "style='background:url(images/left_aboutus.png);'";
	}
}
function left_help_active(){
	if(strpos($_SERVER['REQUEST_URI'],'1852')){
		echo "style='background:url(images/left_help.png);'";
	}
}
function left_feedback_active(){
	if(strpos($_SERVER['REQUEST_URI'],'1853')){
		echo "style='background:url(images/left_feedback.png);'";
	}
}
function left_execptions_active(){
	if(strpos($_SERVER['REQUEST_URI'],'1851')){
		echo "style='background:url(images/left_exceptions.png);'";
	}
}
?>
<div style="width:1000px;margin:0px auto;">
    <div class="left">
        <ul>
            <li><a class ="left_aboutus" <?php left_aboutus_active()?> href="<?php echo jd_archive_url(13,1849);?>" ></a></li>
            <li><a class ="left_help" <?php left_help_active()?> href="<?php echo jd_archive_url(13,1852)?>"></a></li>
            <li><a class ="left_feedback" <?php left_feedback_active()?> href="<?php echo jd_archive_url(13,1853)?>"></a></li>
            <li><a class ="left_exceptions"<?php left_execptions_active()?> href="<?php echo jd_archive_url(13,1851) ?>"></a></li>
        </ul>
    </div>
    <div class="right" style="margin-left:20px;float:left;width:785px;border:0px solid red;">
        <?php echo $article->content?>
    </div>
    <div style="clear:both;"/>
</div>
<?php include 'footer.php';?>