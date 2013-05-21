    <?php if(isset($category)){
    	$cid = $category->alias;
    }else{
    	$cid = 'article';
    }?>
    <div class="container">
      <div class="row-fluid">
		  <div class="span9">
		  	<?php 
		  		$limit = 10;
		  		$start = isset($start)?$start:0;
		  	?>
			<?php foreach (jd_articles($cid,$start, $limit) as $row):?>
			<div class="box">
				<h4><a href="<?php echo jd_article_url($row)?>"><?php echo $row->title?></a></h4>
				<p>
					<?php $category = jd_category($row->cid)?>
					<span class="badge badge-info">作者： 黄树振</span>
					<span class="badge badge-info">分类： <a style="color:#fff" href="<?php echo jd_category_url($category->id)?>"><?php echo $category->title?></a></span>
					<span class="badge badge-info">浏览次数：<?php echo $row->click?></span>
					<span class="badge badge-info"><?php echo date('Y-m-d',strtotime($row->createtime))?></span>
				</p>
				<p>
					<?php echo mb_substr(strip_tags($row->content),0,250); ?>...
				</p>
			</div>
			<?php endforeach;?>
			<!-- 分页 -->
			<?php if(!isset($category)){$category = jd_category('article');}?>
			<div class="pagination pagination-large">
					<?php echo jd_pagination_articles($category, $limit)?>
			</div>
		  </div>
		  <div class="span3">
		  	<div class="box">
		  		<a href="<?php echo site_url("pub")?>" class="btn btn-large btn-block btn-success"><b>发布话题</b></a>
		  	</div>
		  	<!-- 最近更新 -->
		  	<div class="box">
		  		<h4>最近更新</h4>
			  	<ul>
					<?php foreach (jd_articles($cid, 0, 15) as $row):?>
						<li>
							<a href="<?php echo jd_article_url($row)?>" title="<?php echo $row->title?>">
								<?php echo $row->title?>
							</a>
						</li>
					<?php endforeach;?>
				</ul>
			</div>
		</div>
	  </div>
    </div> 
    <!-- /container -->