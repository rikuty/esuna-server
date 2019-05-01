<?php

require_once("../common/conf.php");
/*
$link = mysqli_connect(SERVER_URL, USER_NAME, USER_PASS, DB_NAME);

if (mysqli_connect_errno()) {
    die("Cannot conect:" . mysqli_connect_error() . "\n");
} else {
    //echo "Success\n";
}
*/

$page_title = '管理画面[ログイン]';

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
<div align="left"><a href="http://rikuty.main.jp/test/cms/Top.php">Top</a></div>


<div id="contents">
<form method="POST" action="Menu.php">
<p>ユーザーID：<input type="text" name="user_id"></p>
<p>パスワード：<input type="text" name="password"></p>
<p><input type="submit" value="ログイン"></p>
</form>
</div>

<div id="footer_line">©　Rikuty CO.,LTD.</div>
</body>
</html>