<?php include 'header.php';?>
    <div class="container">
      <div class="row-fluid">
		  <div class="span9">
		  	<div class="box" style="background:#fff;padding:20px 50px;">
				<h1 style="font-size:22px;">
					<?php echo $article->title?>
				</h1>
				<div class="box authorinfo" style="padding:10px;">
					<a href="<?php echo jd_article_url('contact')?>">
						<img alt="author" src="http://qzapp.qlogo.cn/qzapp/100229475/9B8BF41CD2E8E7A2B122A0A3AB0C4F7A/50" class="img-rounded" style="float:left;margin-right:10px;">
					</a>
					<span class="label label-info">分类： <a style="color:#fff" href="<?php echo jd_category_url($category->id)?>"><?php echo $category->title?></a></span>
					<span class="label label-info">作者： 黄树振</span>
					<span class="label label-info">浏览次数：<?php echo $article->click?></span>
					<span class="label label-info"><?php echo date('Y-m-d',strtotime($article->createtime))?></span>
					<br/>
					<span class="label label-info">关键词：游戏、webgame、手机游戏、测试游戏、PC网游</span>
					<div style="clear:both;"></div>
				</div>
				<div>
					<?php echo $article->content?>
				</div>
				<!-- Duoshuo Comment BEGIN -->
				<div class="ds-thread"></div>
				<script type="text/javascript">
				var duoshuoQuery = {short_name:"huangshuzhen"};
					(function() {
						var ds = document.createElement('script');
						ds.type = 'text/javascript';ds.async = true;
						ds.src = 'http://static.duoshuo.com/embed.js';
						ds.charset = 'UTF-8';
						(document.getElementsByTagName('head')[0] 
						|| document.getElementsByTagName('body')[0]).appendChild(ds);
					})();
					</script>
				<!-- Duoshuo Comment END -->
		  	</div>
		  </div>
		  <div class="span3">
		  	<div class="box">
				<h4>最近更新</h4>
			  	<ul>
					<?php foreach (jd_articles($category->id, 0, 15) as $row):?>
						<li>
							<a href="<?php echo jd_article_url($row)?>" <?php echo $row->title?>>
								<?php echo $row->title?>
							</a>
						</li>
					<?php endforeach;?>
			  	</ul>
		  	</div>
		</div>
	  </div>
    </div> 
<?php include 'footer.php';?>
