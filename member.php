<?php
	require_once(dirname(__FILE__).'/include/config.inc.php');
	$id = empty($id) ? 26 : intval($id);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<?php echo GetHeader(1,$id); ?>
		<?php require_once 'inc/link.php' ?>
	</head>

	<body>
		<?php require_once 'inc/head.php' ?>

		<!-- 焦点图开始  -->
		<div class="banner" style="background: url(templates/default/images/member_banner.jpg) center top no-repeat;"></div>
		<!-- 焦点图结束 -->
		
		<div class="layout">
			<div class="page-warp clearfix">
				<h2 class="m-page-title">会员风采</h2>
				<ul class="m-page-nav fl">
					<?php
					$dosql->Execute("SELECT * FROM `#@__infoclass` WHERE parentid=25 AND checkinfo=true ORDER BY orderid ASC");
					while($row = $dosql->GetArray())
					{
						if ($row['linkurl'] == '' and $cfg_isreurl != 'Y') {
							$gourl = 'member.php?id=' . $row['id'];
						} else {
							if ($cfg_isreurl == 'Y') {
								$gourl = 'member-' . $row['id'] . '.html';
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
					<?=Info($id)?>
				</div>
			</div>
		</div>
		<?php require_once 'inc/foot.php' ?>
		<input type="hidden" id="active-nav-id" value="<?=$id?>">
		<input type="hidden" id="active-nav-name" value="member">
	</body>

</html>