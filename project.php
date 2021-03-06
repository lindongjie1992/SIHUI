<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php echo GetHeader(1,21); ?>
		<?php require_once 'inc/link.php' ?>
	</head>

	<body>
		<?php require_once 'inc/head.php' ?>

		<!-- 焦点图开始  -->
		<div class="banner" style="background: url(templates/default/images/project_banner.jpg) center top no-repeat;"></div>
		<!-- 焦点图结束 -->
		
		<div class="layout">
			<div class="page-warp clearfix">
				<h2 class="m-page-title">项目合作</h2>
				<div class="m-page-content2">
					<div class="page-project-items">

						<div class="item clearfix">
							<div class="add fl">
								<?php
								$row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=18 AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
								if(isset($row['id'])) {
									//获取链接地址
									if ($row['linkurl'] == '') {
										$gourl = 'javascript:void(0);';
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
									<a href="<?=$gourl?>">
										<img width="259" height="297" src="<?=$picurl?>"/>
									</a>
									<?php
								}
								?>
							</div>
							<div class="list list1 fr">
								<div class="hd clearfix">
									<span class="fl">1F  项目合作</span>
									<a class="fr" href="project_list-22-1.html">更多 ></a>
								</div>
								<ul class="bd">
									<?php
									$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=22 AND delstate='' AND checkinfo=true ORDER BY orderid DESC",8);
									while($row = $dosql->GetArray()) {
										if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
											$gourl = 'project_show.php?cid=' . $row['classid'] . '&id=' . $row['id'];
										} else if ($cfg_isreurl == 'Y') {
											$gourl = 'project_show-' . $row['classid'] . '-' . $row['id'] . '.html';
										} else {
											$gourl = $row['linkurl'];
										}
										?>
										<li><a title="<?=$row['title']?>" href="<?=$gourl?>"><span class="fr">[<?=date('Y-m-d',$row['posttime'])?>]</span><?=ReStrLen($row['title'],35)?></a></li>
										<?php
									}
									?>
								</ul>
							</div>
						</div>


						<div class="item clearfix">
							<div class="add fl">
								<?php
								$row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=19 AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
								if(isset($row['id'])) {
									//获取链接地址
									if ($row['linkurl'] == '') {
										$gourl = 'javascript:void(0);';
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
									<a href="<?=$gourl?>">
										<img width="259" height="297" src="<?=$picurl?>"/>
									</a>
									<?php
								}
								?>
							</div>
							<div class="list list2 fr">
								<div class="hd clearfix">
									<span class="fl">2F  资源供给</span>
									<a class="fr" href="project_list-23-1.html">更多 ></a>
								</div>
								<ul class="bd">
									<?php
									$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=23 AND delstate='' AND checkinfo=true ORDER BY orderid DESC",8);
									while($row = $dosql->GetArray()) {
										if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
											$gourl = 'project_show.php?cid=' . $row['classid'] . '&id=' . $row['id'];
										} else if ($cfg_isreurl == 'Y') {
											$gourl = 'project_show-' . $row['classid'] . '-' . $row['id'] . '.html';
										} else {
											$gourl = $row['linkurl'];
										}
										?>
										<li><a title="<?=$row['title']?>" href="<?=$gourl?>"><span class="fr">[<?=date('Y-m-d',$row['posttime'])?>]</span><?=ReStrLen($row['title'],35)?></a></li>
										<?php
									}
									?>
								</ul>
							</div>
						</div>
						<div class="item clearfix" style="margin-bottom: 0;">
							<div class="add fl">
								<?php
								$row = $dosql->GetOne("SELECT * FROM `#@__infoimg` WHERE id=20 AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
								if(isset($row['id'])) {
									//获取链接地址
									if ($row['linkurl'] == '') {
										$gourl = 'javascript:void(0);';
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
									<a href="<?=$gourl?>">
										<img width="259" height="297" src="<?=$picurl?>"/>
									</a>
									<?php
								}
								?>
							</div>
							<div class="list list3 fr">
								<div class="hd clearfix">
									<span class="fl">3F  资源需求</span>
									<a class="fr" href="project_list-24-1.html">更多 ></a>
								</div>
								<ul class="bd">
									<?php
									$dopage->GetPage("SELECT * FROM `#@__infolist` WHERE classid=24 AND delstate='' AND checkinfo=true ORDER BY orderid DESC",8);
									while($row = $dosql->GetArray()) {
										if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
											$gourl = 'project_show.php?cid=' . $row['classid'] . '&id=' . $row['id'];
										} else if ($cfg_isreurl == 'Y') {
											$gourl = 'project_show-' . $row['classid'] . '-' . $row['id'] . '.html';
										} else {
											$gourl = $row['linkurl'];
										}
										?>
										<li><a title="<?=$row['title']?>" href="<?=$gourl?>"><span class="fr">[<?=date('Y-m-d',$row['posttime'])?>]</span><?=ReStrLen($row['title'],35)?></a></li>
										<?php
									}
									?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<?php require_once 'inc/foot.php' ?>
	</body>

</html>