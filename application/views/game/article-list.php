<?php include 'header.php';?>

<?php $cid = empty($category)?1:$category->id?>

<?php $rows = jd_articles($cid, 0, 200);?>
<ul>
<?php foreach ($rows as $row):?>
		<li><a href="<?php echo jd_article_url($row)?>" target="_blank"><?php echo $row->title?></a></li>
<?php endforeach;?>
</ul>
<?php include 'footer.php';?>