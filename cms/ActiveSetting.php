<?php

require_once("./../common/conf.php");

$page_title = '管理画面[アクティブユーザー設定]';

// アクティブユーザー設定
$user_id = $_POST['user_id'];
$password = $_POST['password'];
if($user_id != $password){
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
<div align="left"><a href="http://dev.rikuty.net/cms/Top.php">Top</a></div>


<div id="contents">
<center>
<form method="POST" action="ActiveSetting.php">
<table id="as_table">
	<tr><td id="as_table_left">アクティブユーザーID</td><td id="as_table_right"><input type="text" name="user_id"></td></tr>
	<tr><td id="as_table_left">パスワード</td><td id="as_table_right"><input type="text" name="password"></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="ログイン"></td></tr>
</table>
</form>
</center>
</div>

<div id="footer_line">©　Rikuty CO.,LTD.</div>
</body>
</html>