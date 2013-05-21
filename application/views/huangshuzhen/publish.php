<?php include 'header.php';?>
    <div class="container">
      <div class="row-fluid">
		  <div class="span9">
		  	<div class="box" style="">
		  		<h4>发表新话题</h4>
		  		<div style="padding:20px;">
		  		<?php if(isset($info)):?>
		  			<?php echo $info?>
		  		<?php else:?>
					<?php echo form_open('pub',array('class'=>'form-horizontal'))?>
						<div class="control-group">
					     <select name="cid">
					      		<?php echo jd_category_select('article')?>
					      </select>
					      	<span style="color:red;font-weight:bolder;">（请选择一个栏目）</span>
	    				</div>
					  <div class="control-group">
					      <input type="text" class="input-xxlarge" id="title" name="title" placeholder="这里输入标题">
					  </div>
					  <div class="control-group">
					      <textarea rows="10" class="input-xxlarge" id="content" name="content" placeholder="这里输入内容"></textarea>
					  </div>
					  <div class="control-group">
					      <button type="submit" class="btn btn-large btn-primary ">提交</button>
					  </div>
					  <?php echo form_close();?>
				  <?php endif;?>
				  </div>
		  	</div>
		  </div>
		  <div class="span3">
		  	<div class="box">
				<h4>最近更新</h4>
			  	<ul>
					<?php foreach (jd_articles('article', 0, 15) as $row):?>
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
