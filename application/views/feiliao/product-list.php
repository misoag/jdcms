<?php include 'header.php';?>
<table width="1002" border="0" align="center" cellpadding="0" cellspacing="0" background="images/bj.jpg">
	<tr>
		<td width="254" valign="top">
		<TABLE WIDTH=254 BORDER=0 CELLPADDING=0 CELLSPACING=0>
			<TR>
				<TD><IMG SRC="images/zuo_1.jpg" WIDTH=254 HEIGHT=47 ALT=""></TD>
			</TR>
			<TR>
				<TD width="254" height="119" valign="top">
				<table width="254" border="0" cellpadding="0" cellspacing="0" background="images/bg2.jpg">
					<tr>
						<td width="40">&nbsp;</td>
						<td height="27">
						<table width="95%" border="0" cellspacing="0" cellpadding="0">
							<?php foreach (jd_category_list('product') as $row):?>
							<tr>
								<td height="27" valign="middle"><a href="<?php echo jd_category_url($row);?>"><?php echo $row->title?></a></td>
							</tr>
							<?php endforeach;?>
						</table>
						</td>
					</tr>
				</table>
				</TD>
			</TR>
			<TR>
				<TD><IMG SRC="images/zuo_3.jpg" WIDTH=254 HEIGHT=37 ALT=""></TD>
			</TR>
			<TR>
				<TD width="254" height="145" valign="top" background="images/zuo_4.jpg">
				<table width="254" height="149" border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td width="23">&nbsp;</td>
						<td width="231" valign="middle">
						<?php include 'linkus.php';?>
						</td>
					</tr>
				</table>

				</TD>
			</TR>
		</TABLE>
		</td>
		<td width="31" height="348" valign="top"><IMG SRC="images/you_1.jpg" WIDTH=31 HEIGHT=348 ALT=""></td>
		<td width="717" valign="top">
		<table width="717" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td valign="top">
				<table width="717" border="0" cellspacing="0" cellpadding="0">
					<tr>
						<td width="270" height="52" align="right" valign="top" background="images/you_2.jpg">
						<table width="94%" border="0" cellspacing="0" cellpadding="0">
							<tr>
								<td width="100%" height="39" valign="bottom">您现在的位置：<a href="<?php echo site_url()?>">网站首页</a>&gt;&gt;产品中心</td>
							</tr>
						</table>
						</td>
						<td width="433" height="52" background="images/bg1.jpg">&nbsp;</td>
						<td width="14" height="52" valign="top"><IMG SRC="images/you_4.jpg" WIDTH=14 HEIGHT=52 ALT=""></td>
					</tr>
				</table>
				</td>
			</tr>
			<tr>
				<td width="717" height="296" valign="top">
				<?php $limit = 9;?>
				<?php foreach (jd_products($category->id, $start, $limit) as $row):?>
					<div style="float:left;border:2px solid #ccc;margin-left:10px;margin-bottom:10px;">
						<a href="<?php echo jd_product_url($row)?>" target="_blank">
							<img alt="" src="<?php echo $row->preimg?>" style="width:200px;display:block;border:none;">
							<span style="display:block;text-align:center;"><?php echo $row->title?></span>
						</a>
					</div>
				<?php endforeach;?>
				</td>
			</tr>
			<tr>
				<td>
				<?php echo jd_pagination_products($category, $limit)?>
				</td>
			</tr>
		</table>
		</td>
	</tr>
</table>
<?php include 'footer.php';?>