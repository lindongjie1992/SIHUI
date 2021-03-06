<?php
	require_once(dirname(__FILE__).'/include/config.inc.php');
	$cid = empty($cid) ? 22 : intval($cid);
	$id = empty($id) ? 0 : intval($id);
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
		<div class="banner" style="background: url(templates/default/images/project_banner.jpg) center top no-repeat;"></div>
		<!-- 焦点图结束 -->
		
		<div class="layout">
			<div class="page-warp clearfix">
				<h2 class="m-page-title"><?=getCatName($cid)?></h2>
				<ul class="m-page-nav fl">
					<?php
					$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=21 AND checkinfo=true ORDER BY orderid ASC");
					while($row = $dosql->GetArray())
					{
						if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
							$gourl = 'project_list.php?id=' . $row['id'];
						} else {
							if ($cfg_isreurl == 'Y') {
								$gourl = 'project_list-' . $row['id'] . '-1.html';
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
				<?php
				$row = $dosql->GetOne("SELECT * FROM `#@__infolist` WHERE id=$id AND delstate='' AND checkinfo=true");
				if(isset($row['id'])) {
				if ($row['content'] == '') {
					$content = "资料整理中...";
				} else {
					$content = $row['content'];
				}
				?>


				<div class="m-page-content1 fr">
					<?= $content ?>
					<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php require_once 'inc/foot.php' ?>
		<input type="hidden" id="active-nav-id" value="<?=$cid?>">
		<input type="hidden" id="active-nav-name" value="project_list">
	</body>

</html>