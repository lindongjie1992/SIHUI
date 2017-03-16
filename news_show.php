<?php
	require_once(dirname(__FILE__).'/include/config.inc.php');
	$cid = empty($cid) ? 15 : intval($cid);
	$id  = empty($id)  ? 0 : intval($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php echo GetHeader(1,$cid,$id); ?>
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
							$gourl = 'news.php?cid=' . $row['id'];
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
					<div class="article-content1">
						<?php
							$row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE id=$id");
							if(is_array($row))
						{
						//增加一次点击量
						$dosql->ExecNoneQuery("UPDATE `#@__infolist` SET hits=hits+1 WHERE id=$id");
						?>
						<!-- 标题区域开始 -->
						<h1 class="title"><?php echo $row['title']; ?></h1>
						<div class="info">
						<div class="information">
							<span>更新时间：</span><?php echo GetDateTime($row['posttime']); ?>
							<span>点击次数：</span><?php echo $row['hits']; ?>次
							<span>编辑：<?php echo $row['author'];?></span>
						</div>
						<!-- 标题区域结束 -->
						<div id="textarea">
							<?php
							if ($row['content'] != '')
								echo GetContPage($row['content']);
							else
								echo '网站资料更新中...';
							?>
						</div>

						<ul class="page-turning clearfix">
							<?php
							}
							//获取上一篇信息
							$r = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=".$row['classid']." AND orderid<".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid DESC");
							if($r < 1)
							{
								echo '<li class="fl">上一篇：已经没有了</li>';
							}
							else
							{
								if($cfg_isreurl != 'Y')
									$gourl = 'news_show.php?cid='.$r['classid'].'&id='.$r['id'];
								else
									$gourl = 'news_show-'.$r['classid'].'-'.$r['id'].'.html';

								echo '<li class="fl">上一篇：<a href="'.$gourl.'">'.$r['title'].'</a></li>';
							}

							//获取下一篇信息
							$r = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE classid=".$row['classid']." AND orderid>".$row['orderid']." AND delstate='' AND checkinfo=true ORDER BY orderid ASC");
							if($r < 1)
							{
								echo '<li class="fr">下一篇：已经没有了</li>';
							}
							else
							{
								if($cfg_isreurl != 'Y')
									$gourl = 'news_show.php?cid='.$r['classid'].'&id='.$r['id'];
								else
									$gourl = 'news_show-'.$r['classid'].'-'.$r['id'].'.html';

								echo '<li class="fr">下一篇：<a href="'.$gourl.'">'.$r['title'].'</a></li>';
							}
							?>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
		<?php require_once 'inc/foot.php' ?>
	</body>

</html>