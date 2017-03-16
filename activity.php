<?php
	require_once(dirname(__FILE__).'/include/config.inc.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php echo GetHeader(1,19); ?>
		<?php require_once 'inc/link.php' ?>
	</head>

	<body>
		<?php require_once 'inc/head.php' ?>

		<!-- 焦点图开始  -->
		<div class="banner" style="background: url(templates/default/images/activity_banner.jpg) center top no-repeat;"></div>
		<!-- 焦点图结束 -->
		
		<div class="layout">
			<div class="page-warp clearfix">
				<h2 class="m-page-title">专题活动</h2>
				<div class="m-page-content2">
					<div class="activity-hd">
						<a href="#" class="clearfix">
							<div class="title fl">
								四会新规划<br />
								一区两城三基地
							</div>
							<div class="img fl">
								<img src="templates/default/images/subject_03.jpg"/>
							</div>
						</a>
					</div>
					<ul class="activity-bd clearfix">
						<?php
						$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=19 AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
						while($row = $dosql->GetArray()) {
							//获取链接地址
							if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
								$gourl = 'activity_show.php?cid=' . $row['classid'] . '&id=' . $row['id'];
							} else {
								if ($cfg_isreurl == 'Y') {
									$gourl = 'activity_show-' . $row['classid'] . '-' . $row['id'] . '.html';
								} else {
									$gourl = $row['linkurl'];
								}
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
									<div class="img"><img src="<?=$picurl?>"/></div>
									<div class="title"><?=ReStrLen($row['title'],18)?></div>
								</a>
							</li>
							<?php
						}
						?>
					</ul>
				</div>
			</div>
		</div>

		<?php require_once 'inc/foot.php' ?>
	</body>

</html>