<?php

require_once("./../common/conf.php");
/*
session_start();
if(isset($_SESSION['login'])){
	echo 'セッション情報破棄<br>';
	unset($_SESSION['manager_name'] );
	unset($_SESSION['account'] );
	unset($_SESSION['password'] );
	unset($_SESSION['auth_level'] );
	unset($_SESSION['login'] );
}
*/
$page_title = '管理画面[ログイン]';

$error_flg = false;

//var_dump($_SERVER);
//echo "<br>";
var_dump($_SESSION);
echo "<br>";
var_dump($_POST);

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
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
		$_SESSION['manager_name'] = $row['manager_name'];
		$_SESSION['account'] = $row['account'];
		$_SESSION['password'] = $row['password'];
		$_SESSION['auth_level'] = $row['auth_level'];
		$_SESSION['login'] = true;

		header('Location: http://dev.rikuty.net/cms/Menu.php');
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

<div id="contents">

<?php 
	if($error_flg)
	{
		echo '<font color="#FF0000" size="2">入力情報に誤りがあります。</font>';
	}
?>

<form method="POST" action="Top.php">
<p>ユーザーID：<input type="text" name="account"></p>
<p>パスワード：<input type="password" name="password"></p>
<p><input type="submit" value="login"></p>
</form>
</div>

<div id="footer_line">©　Rikuty CO.,LTD.</div>
</body>
</html>