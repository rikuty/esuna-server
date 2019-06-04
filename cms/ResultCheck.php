<?php

require_once("./../common/conf.php");

session_start();

$page_title = '管理画面[結果シート確認]';

$manager_name = $_SESSION['manager_name'];

// 結果シート確認
$user_id - 0;
if(isset($_POST['user_id'])) {
	$user_id = $_POST['user_id'];

	// TODO 結果シート取得

	// TODO 結果シート出力
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

<form method="POST" action="ResultCheck.php">
<table id="as_table">
	<tr><td id="as_table_left">ユーザーID</td><td id="as_table_right"><input type="text" name="user_id"></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="確認"></td></tr>
</table>
</form>

</center>
</div>

<div id="footer_line">©　Rikuty CO.,LTD.</div>
</body>
</html>