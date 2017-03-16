<?php require_once(dirname(__FILE__).'/include/config.inc.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php echo GetHeader(1); ?>
		<?php require_once 'inc/link.php' ?>
	</head>

	<body>
		<?php require_once 'inc/head.php' ?>
		<!-- 焦点图开始  -->
		<div class="banner">
			<div class="swiper-container">
				<div class="swiper-wrapper">
					<?php
					$dosql->Execute("SELECT * FROM `#@__infoimg` WHERE classid=13 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,5");
					while($row = $dosql->GetArray()) {
						if ($row['linkurl'] != '') {
							$gourl = $row['linkurl'];
						} else {
							$gourl = 'javascript:;';
						}
						?>
						<div class="swiper-slide" style="background:url(<?=$row['picurl']?>) center top no-repeat">
							<a href="<?=$gourl?>" style="display: block; height: 100%;"></a>
						</div>
						<?php
					}
					?>
				</div>
				<!-- Add Pagination -->

				<!-- Add Arrows -->
				<div class="swiper-button-next swiper-button-white"></div>
				<div class="swiper-button-prev swiper-button-white"></div>
			</div>
		</div>
		<!-- 焦点图结束 -->
		
		<div class="layout">
			<!-- 首页最新动态开始 -->
			<div class="index-news">
				<div class="index-news-hd clearfix">
					<h2 class="index-news-title fl">
						最新动态
						<span>NEWS</span>
					</h2>
					<a class="index-news-more fr" href="#">更多</a>
				</div>
				<div class="index-news-bd clearfix">
					<dl class="index-news-hot fl">
						<?php
						$row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE parentid=4 AND flag LIKE '%h%' AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
						if(isset($row['id'])) {
							//获取链接地址
							if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
								$gourl = 'news_show.php?cid=' . $row['classid'] . '&id=' . $row['id'];
							} else {
								if ($cfg_isreurl == 'Y') {
									$gourl = 'news_show-' . $row['classid'] . '-' . $row['id'] . '.html';
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
							<dt>
								<a href="<?=$gourl?>" title="<?=$row['title']?>">
									<img width="266" height="185" src="<?=$picurl?>" alt=""/>
								</a>
							</dt>
							<dd class="title"><a href="<?=$gourl?>" title="<?=$row['title']?>"><?=ReStrLen($row['title'],12);?></a></dd>
							<dd class="desc"><?=ReStrLen($row['description'],70);?></dd>
							<dd class="more">
								<a href="<?=$gourl?>">详情 ></a>
							</dd>
							<?php
						}
						?>
					</dl>
					<ul class="index-news-list fr">
						<?php
							$dosql->Execute("SELECT * FROM `#@__infolist` WHERE (classid=4 or parentid=4) AND delstate='' AND flag='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,5");
							while($row = $dosql->GetArray()) {
								//获取链接地址
								if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
									$gourl = 'news_show.php?cid=' . $row['classid'] . '&id=' . $row['id'];
								} else {
									if ($cfg_isreurl == 'Y') {
										$gourl = 'news_show-' . $row['classid'] . '-' . $row['id'] . '.html';
									} else {
										$gourl = $row['linkurl'];
									}
								}
								?>
								<li>
									<a href="<?=$gourl?>" title="<?=$row['title']?>">
										<span class="date">【<?=date('Y-m-d',$row['posttime'])?>】 </span>
										<?=ReStrLen($row['title'],18)?>
									</a>
								</li>
								<?php
							}
						?>
					</ul>
				</div>
			</div>
			<!-- 首页最新动态结束 -->
	
			<!-- 首页专题活动开始 -->
			<?php
			$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=19 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,3");
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
				<div class="index-activities">
					<div class="index-activities-hd">
						<h2 class="m-index-title">
							专题活动
							<span>ACTIVITIES</span>
						</h2>
					</div>
					<ul class="index-activities-bd clearfix">

						<li>
							<a href="<?=$gourl?>">
								<div class="img">
									<img width="350" height="200" src="<?= $picurl ?>" alt=""/>
								</div>
								<h2 class="title">
									<?= ReStrLen($row['title'], 20) ?>
								</h2>
							</a>
						</li>
					</ul>
				</div>
				<?php
			}
			?>
			<!-- 首页专题活动结束 -->
	
			<!-- 首页明星会员开始 -->
			<?php
			$row = $dosql->GetOne("SELECT * FROM `#@__member_star` WHERE classid=20 AND flag LIKE '%h%' AND checkinfo=true ORDER BY orderid DESC");
			if(isset($row['id'])) {
				?>
				<div class="index-member-star">
					<div class="index-member-star-hd">
						<h2 class="m-index-title">
							明星会员
							<span>MEMBER STAR</span>
						</h2>
					</div>
					<div class="index-member-star-bd clearfix">

						<div class="info fl">
							<div class="name"><?= $row['title'] ?></div>
							<div class="job"><?= $row['job'] ?></div>
							<div class="desc">
								<?= ReStrLen($row['content'], 250) ?>
							</div>
						</div>
						<div class="img fl">
							<img src="<?= $row['picurl'] ?>" alt=""/>
						</div>

					</div>
				</div>
				<?php
			}
			?>
			<!-- 首页明星会员结束 -->
	
			<!-- 项目合作开始 -->
			<div class="index-cooperation">
				<div class="index-cooperation-hd">
					<h2 class="m-index-title">
						项目合作 
						<span>COOPERATION</span>
					</h2>
				</div>
				<div class="index-cooperation-bd clearfix">
					<div class="item">
						<div class="title">项目合作</div>
						<ul class="list">
							<?php
							$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=22 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,5");
							while($row = $dosql->GetArray()) {
								//获取链接地址
								if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
									$gourl = 'project_show.php?cid=' . $row['classid'] . '&id=' . $row['id'];
								} else if ($cfg_isreurl == 'Y') {
									$gourl = 'project_show-' . $row['classid'] . '-' . $row['id'] . '.html';
								} else {
									$gourl = $row['linkurl'];
								}
								?>
								<li><a title="<?=$row['title']?>" href="<?=$gourl?>"><?=ReStrLen($row['title'],18)?></a></li>
								<?php
							}
							?>
						</ul>
					</div>
					<div class="item">
						<div class="title">资源需求</div>
						<ul class="list">
							<?php
							$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=23 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,5");
							while($row = $dosql->GetArray()) {
								//获取链接地址
								if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
									$gourl = 'project_show.php?cid=' . $row['classid'] . '&id=' . $row['id'];
								} else if ($cfg_isreurl == 'Y') {
									$gourl = 'project_show-' . $row['classid'] . '-' . $row['id'] . '.html';
								} else {
									$gourl = $row['linkurl'];
								}

								?>
								<li><a title="<?=$row['title']?>" href="<?=$gourl?>"><?=ReStrLen($row['title'],18)?></a></li>
								<?php
							}
							?>
						</ul>
					</div>
					<div class="item">
						<div class="title">资源提供</div>
						<ul class="list">
							<?php
							$dosql->Execute("SELECT * FROM `#@__infolist` WHERE classid=24 AND delstate='' AND checkinfo=true ORDER BY orderid DESC LIMIT 0,5");
							while($row = $dosql->GetArray()) {
								//获取链接地址
								if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
									$gourl = 'project_show.php?cid=' . $row['classid'] . '&id=' . $row['id'];
								} else if ($cfg_isreurl == 'Y') {
									$gourl = 'project_show-' . $row['classid'] . '-' . $row['id'] . '.html';
								} else {
									$gourl = $row['linkurl'];
								}

								?>
								<li><a title="<?=$row['title']?>" href="<?=$gourl?>"><?=ReStrLen($row['title'],18)?></a></li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>
			</div>
			<!-- 项目合作结束 -->
	
			<!-- 四会新姿开始 -->
			<div class="index-new-sihui">
				<div class="index-new-sihui-hd">
					<h2 class="m-index-title">
						四会新姿 
						<span>NEW SIHUI</span>
					</h2>
				</div>
				<ul class="index-new-sihui-bd clearfix">
					<li>
						<a class="big-item" href="#">
							<img width="404" height="239" src="templates/default/images/new_sihui_img01.jpg" alt="" />
						</a>
					</li>
					<li>
						<a class="item first-item" href="#">
							<span>四会概况</span>
							<img src="templates/default/images/new_sihui_img02.jpg" alt="" />
						</a>
						<a class="item mt13" href="#">
							<span>优惠政策</span>
							<img src="templates/default/images/new_sihui_img04.jpg" alt="" />
						</a>
					</li>
					<li>
						<a class="item" href="#">
							<span>投资环境</span>
							<img src="templates/default/images/new_sihui_img03.jpg" alt="" />
						</a>
						<a class="item mt13" href="#">
							<span>最新动向</span>
							<img src="templates/default/images/new_sihui_img05.jpg" alt="" />
						</a>
					</li>
				</ul>
			</div>
			<!-- 四会新姿结束 -->
		</div>

		<?php require_once 'inc/foot.php' ?>

		<script>
			var swiper = new Swiper('.swiper-container', {
				pagination: '.swiper-pagination',
				paginationClickable: '.swiper-pagination',
				nextButton: '.swiper-button-next',
				prevButton: '.swiper-button-prev',
				spaceBetween: 30,
				effect: 'fade',
				loop : true,
				autoplay : 5000
			});
		</script>
	</body>

</html>