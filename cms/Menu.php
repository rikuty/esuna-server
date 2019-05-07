<?php

require_once("./../common/conf.php");

$page_title = '管理画面[メニュー]';

// ログイン判定
$manager_id = $_POST['manager_id'];
$password = $_POST['password'];

// 管理者情報取得
$sql = "SELECT * FROM u_manager WHERE manager_id = '".$manager_id."' AND password = '".$password."'";
$stmt = $pdo->query($sql);
//while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    //echo $row["user_id"]." : ".$row["name"]."\n";
    //echo json_encode($row, JSON_UNESCAPED_UNICODE);
//}
echo $sql;

echo "<br>";

echo $stmt->rowCount();

if($user_id != $password){
	// TOPにリダイレクト
	//header('Location: http://rikuty.main.jp/test/cms/Top.php');
	//exit;
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

<br>
<a href="http://dev.rikuty.net/cms/ActiveSetting.php">アクティブユーザー設定</a><br>
<a href="">プリント設定（仮）</a><br>
<a href="">その他設定</a><br>
<a href="">その他設定</a><br>
<br>
<br>

<div id="footer_line">© Rikuty CO.,LTD.</div>
</body>
</html>