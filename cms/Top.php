<?php

require_once("./../common/conf.php");

$page_title = '管理画面[ログイン]';

$error_flg = false;

// ログイン判定用
if(isset($_POST['account'])){
	$account = $_POST['account'];
	$password = $_POST['password'];

	// 管理者情報取得
	$sql = "SELECT * FROM u_manager WHERE account = '".$account."' AND password = '".$password."'";
	$stmt = $pdo->query($sql);

	//TODO キャッシュにユーザー情報を記憶

	if($stmt->rowCount() == 0){
		$error_flg = true;
	} else {
		header('Location: http://rikuty.main.jp/test/cms/Menu.php');
		exit;
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
<div align="left"><a href="http://dev.rikuty.net/cms/Top.php">Top</a></div>

<?php 
	if($error_flg)
	{
		echo '<div style=”color:red;”>入力情報に誤りがあります。</div>';
	}
?>

<div id="contents">
<form method="POST" action="Top.php">
<p>ユーザーID：<input type="text" name="account"></p>
<p>パスワード：<input type="password" name="password"></p>
<p><input type="submit" value="ログイン"></p>
</form>
</div>

<div id="footer_line">©　Rikuty CO.,LTD.</div>
</body>
</html>