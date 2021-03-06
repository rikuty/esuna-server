<?php

require_once("./../common/conf.php");

session_start();

$page_title = '管理画面[アクティブユーザー設定]';

$manager_name = $_SESSION['manager_name'];

// アクティブユーザー設定
$user_id - 0;
$active = 10;
if(isset($_POST['facility_id']) && isset($_POST['user_id']) && isset($_POST['active'])){
	$facility_id = $_POST['facility_id'];
	$user_id = $_POST['user_id'];

	// 施設のアクティブユーザーを設定
	if($_POST['active'] == 'on'){
		$sql = "UPDATE u_facility SET active_user_id = ".$user_id." WHERE facility_id = ".$facility_id;
		$stmt = $pdo->query($sql);
		$stmt->execute();
	} else {
		$sql = "UPDATE u_facility SET active_user_id = null WHERE facility_id = ".$facility_id;
		$stmt = $pdo->query($sql);
		$stmt->execute();
	}
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $page_title; ?></title>
<link rel="stylesheet" href="common.css" type="text/css" />
<script type="text/javascript">
</script>
</head>
<body>
<div id="header_line"><?php echo $page_title; ?></div>
<div align="left"><a href="http://dev.rikuty.net/cms/Top.php">ログアウト[<?php echo $manager_name; ?>]</a></div><br>
<a href="http://dev.rikuty.net/cms/Menu.php">Menuに戻る</a><br>


<div id="contents">
<center>
<?php 
if(isset($_POST['active']))
{
	if($_POST['active'] == 'on'){
		echo '<font color="#FF0000" size="2">ユーザーID['.sprintf("%08d", $user_id).']をアクティブにしました。</font>';
	} else {
		echo '<font color="#FF0000" size="2">ユーザーID['.sprintf("%08d", $user_id).']を非アクティブにしました。</font>';
	}
}
?>
<form method="POST" action="ActiveSetting.php">
<table id="as_table">
	<tr><td id="as_table_left">施設ID</td><td id="as_table_right"><input type="text" name="facility_id"></td></tr>
	<tr><td id="as_table_left">ユーザーID</td><td id="as_table_right"><input type="text" name="user_id"></td></tr>
	<tr><td id="as_table_left">アクティブ設定</td><td id="as_table_right">
		<input type="radio" name="active" value="on" selected> アクティブ
		<input type="radio" name="active" value="off"> 解除
	</td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="設定"></td></tr>
</table>
</form>
</center>
</div>

<div id="footer_line">©　Rikuty CO.,LTD.</div>
</body>
</html>