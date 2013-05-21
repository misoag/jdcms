<?php include 'header.php';?>
<table width=1002 border=0 align="center" cellpadding=0 cellspacing=0>
	<tr>
		<td><img src="images/zj_1.jpg" width=139 height=55 alt="公司简介"></td>
		<td height="55" colspan=4 background="images/bj.jpg">&nbsp;</td>
		<td><a href="<?php echo jd_article_url('gsjj')?>"><img src="images/zj_3.jpg" alt="更多" width=60 height=55 border="0"></a></td>
		<td rowspan=2><img src="images/zj_4.jpg" width=39 height=161 alt=""></td>
		<td><img src="images/zj_5.jpg" width=147 height=55 alt="新闻动态"></td>
		<td height="55" colspan=3 valign="top" background="images/bj.jpg">&nbsp;</td>
		<td><a href="<?php echo jd_category_url('article')?>"><img src="images/zj_7.jpg" alt="更多" width=68 height=55 border="0"></a></td>
	</tr>
	<tr>
		<td colspan=3><img src="images/zj_8.jpg" width=177 height=106 alt=""></td>
		<td height="106" colspan=3 valign="top" background="images/bj.jpg">
		<table width="96%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td height="84">
					<!-- 公司简介 -->
					<?php
						$content = jd_article('gsjj')->content;
						echo jd_substr(strip_tags($content),90);
					?>
				</td>
			</tr>
		</table>
		</td>
		<td height="106" colspan=5 align="center" valign="top" background="images/bj.jpg">
		<table width="91%" border="0" cellpadding="0" cellspacing="0">
			<?php foreach (jd_articles('gsxw', 0, 4) as $row):?>
			<tr>
				<td width="84%" height="26">· <a href="<?php echo jd_article_url($row->id)?>" target="_blank" title="<?php echo $row->title?>"><?php echo jd_substr($row->title,40)?></a></td>
				<td width="16%">[<?php echo substr($row->createtime, 0,10)?>]</td>
			</tr>
			<?php endforeach;?>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan=4><a href="<?php echo jd_category_url('gsxw')?>"><img src="images/zj_11.jpg" alt="土肥知识" width=332 height=43 border="0"></a></td>
		<td colspan=3><img src="images/zj_12.jpg" width=130 height=43 alt="product info"></td>
		<td height="43" colspan=2 background="images/bj2.jpg">&nbsp;</td>
		<td><img src="images/zj_14.jpg" width=55 height=43 alt=""></td>
		<td colspan=2><img src="images/zj_15.jpg" width=281 height=43 alt="联系我们"></td>
	</tr>
	<tr>
		<td height="128" colspan=4 valign="top" background="images/zj_16.jpg">
		<table width="332" height="123" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="32">&nbsp;</td>
				<td width="300" valign="top">
				<table width="96%" border="0" cellpadding="0" cellspacing="0">
					<?php foreach (jd_articles('gsxw', 0, 5) as $row):?>
					<tr>
						<td width="75%" height="27">
							· <a href="<?php echo jd_article_url($row->id)?>" target="_blank" title="<?php echo $row->title?>"><?php echo jd_substr($row->title,20)?></a>
						</td>
						<td width="25%">[<?php echo substr($row->createtime, 0,10)?>]</td>
					</tr>
					<?php endforeach;?>
				</table>
				</td>
			</tr>
		</table>
		</td>
		<td height="128" colspan=6 valign="top" background="images/bj1.jpg">
		<table width="100%" height="125" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="5%">&nbsp;</td>
				<td width="91%" height="128" valign="top">
				<?php include 'marquee.php';?>
				<td width="4%">&nbsp;</td>
			</tr>
		</table>
		</td>
		<td height="143" colspan=2 rowspan=2 valign="top" background="images/zj_18.jpg">
		<table width="281" height="136" border="0" cellpadding="0" cellspacing="0">
			<tr>
				<td width="20">&nbsp;</td>
				<td width="261" valign="middle"><?php include 'linkus.php';?></td>
			</tr>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan=4><img src="images/zj_19.jpg" width=332 height=15 alt=""></td>
		<td colspan=6><img src="images/zj_20.jpg" width=389 height=15 alt=""></td>
	</tr>
	<tr>
		<td colspan=2><img src="images/zj_21.jpg" width=143 height=33 alt=""></td>
		<td height="33" colspan=10 background="images/bj.jpg">
		<!-- 友情链接 -->
		<a href="" target='_blank'>施得乐化肥</a> 
		<a href="" target='_blank'>山东农资</a> 
		<a href="" target='_blank'>偏硅酸钠</a> 
		<a href="" target='_blank'>水性玻璃油墨</a> 
		<a href="" target='_blank'>有机肥</a> 
		<a href="" target='_blank'>氯醋树脂</a> 
		<a href="" target='_blank'>水处理药剂</a> 
		<a href="" target='_blank'>生物肥</a> 
		<a href="" target='_blank'>石蜡乳化剂</a> 
		<a href="" target='_blank'>润滑脂</a> 
		<a href="" target='_blank'>氯化镁</a> 
		<a href="" target='_blank'>洗涤剂</a> 
		<a href="" target='_blank'>冲施肥</a> 
		<a href="" target='_blank'>盐酸供应商</a> 
		<a href="" target='_blank'>木薯淀粉</a></td>
	</tr>
	<tr>
		<td><img src="images/spacer.gif" width=139 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=4 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=34 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=155 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=31 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=60 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=39 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=147 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=57 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=55 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=213 height=1 alt=""></td>
		<td><img src="images/spacer.gif" width=68 height=1 alt=""></td>
	</tr>
</table>
<?php include 'footer.php';?>
