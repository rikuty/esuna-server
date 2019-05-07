<?php

require_once("./../common/conf.php");

session_start();

$page_title = '管理画面[メニュー]';
/*
var_dump($_SESSION);
echo "<br>";
var_dump($_POST);
*/
if(!$_SESSION['login']){
	// ログインしてなければTopに戻す
	header('Location: http://dev.rikuty.net/cms/Top.php');
	exit;
}

$manager_name = $_SESSION['manager_name'];

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
<div align="left"><a href="http://dev.rikuty.net/cms/Top.php">ログアウト[<?php echo $manager_name; ?>]</a></div>

<br>
<a href="http://dev.rikuty.net/cms/ActiveSetting.php">アクティブユーザー設定</a><br>
<a href="">プリント設定（仮）</a><br>
<a href="">その他設定</a><br>
<br>
<br>

<div id="footer_line">© Rikuty CO.,LTD.</div>
</body>
</html>