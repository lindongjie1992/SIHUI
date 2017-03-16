<?php
	require_once(dirname(__FILE__).'/include/config.inc.php');
	$cid = empty($cid) ? 4 : intval($cid);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php echo GetHeader(1,$cid); ?>
		<?php require_once 'inc/link.php' ?>
	</head>

	<body>
		<?php require_once 'inc/head.php' ?>

		<!-- 焦点图开始  -->
		<div class="banner" style="background: url(templates/default/images/banner_02.jpg) center top no-repeat;"></div>
		<!-- 焦点图结束 -->
		
		<div class="layout">
			<div class="page-warp clearfix">
				<h2 class="m-page-title"><?=GetCatName($cid)?></h2>
				<ul class="m-page-nav fl">
					<?php
					$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=4 AND checkinfo=true ORDER BY orderid DESC");
					while($row = $dosql->GetArray())
					{
						if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
							$gourl = 'news.php?id=' . $row['id'];
						} else {
							if ($cfg_isreurl == 'Y') {
								$gourl = 'news-' . $row['id'] . '-1.html';
							} else {
								$gourl = $row['linkurl'];
							}
						}
						?>
						<li><a href="<?=$gourl?>"><?=$row['classname']?></a></li>
						<?php
					}
					?>
				</ul>
				<div class="m-page-content1 fr">
					<ul class="page-news-list">
						<?php

						$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE (classid=$cid OR parentstr LIKE '%,$cid,%') AND delstate='' AND checkinfo=true ORDER BY orderid DESC",8);
						while($row = $dosql->GetArray()) {
							if ($row['linkurl'] == '' and $cfg_isreurl != 'Y'){
								$gourl = 'news_show.php?cid=' . $row['classid'] . '&id=' . $row['id'];
							} else if ($cfg_isreurl == 'Y') {
								$gourl = 'news_show-' . $row['classid'] . '-' . $row['id'] . '.html';
							} else {
								$gourl = $row['linkurl'];
							}

							//获取缩略图地址
							if ($row['picurl'] != '') {
								$picurl = $row['picurl'];
							} else {
								$picurl = 'templates/default/images/nofoundpic.gif';
							}
							?>
							<li>
								<a href="<?=$gourl?>">
									<dl>
										<dt class="img">
											<img width="154" height="107" src="<?=$picurl?>"/>
										</dt>
										<dd class="title"><?=ReStrLen($row['title'],25)?></dd>
										<dd class="desc">
											<?=ReStrLen($row['description'],100)?>
										</dd>
									</dl>
								</a>
							</li>
							<?php
						}
						?>
					</ul>
					<?php echo $dopage->GetList(); ?>
				</div>
			</div>
		</div>

		<?php require_once 'inc/foot.php' ?>
	</body>

</html>