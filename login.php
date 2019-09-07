<?php
require_once("./common/UtilClass.php");

$page_title = 'PainVR | ログイン';

$fid = $_GET['fid'];

// 新規登録用URL
$signup_url = "signup.php?fid=".$fid;

$message_flg = '';
if( isset($_POST['uid']) && strlen($_POST['uid']) > 0 )
{
	$uid = $_POST['uid'];

	$message_flg = UtilClass::loginFacility($uid, $fid);
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<title><?php echo $page_title; ?></title>
<link rel="stylesheet" href="cms/common.css" type="text/css" />
<script type="text/javascript">
</script>
</head>
<body>
<div id="header_line"><?php echo $page_title; ?></div>


<div id="contents">
<?php 
	if($message_flg == 'success')
	{
		echo '<center><font color="#00FF00" size="2">ログイン完了</font></center>';
		exit;
	} else {
		echo '<font color="#FF0000" size="2">'.$message_flg.'</font>';
	}
?>
<center>
<form method="POST" action="">
<table id="as_table">
	<tr><td id="as_table_left">ユーザーID</td><td id="as_table_right"><input type="text" name="uid"></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="ログイン"></td></tr>
</table>
</form>
<br>
<a href=<?= $signup_url ?>>新規登録はコチラ</a>
</center>
</div>

<div id="footer_line">©　Rikuty CO.,LTD.</div>
</body>
</html>