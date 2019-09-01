<?php

require_once("./common/conf.php");

$page_title = '新規ユーザー登録';

//var_dump($_POST);

$message_flg = '';
if(
strlen($_POST['nickname']) > 0 && 
strlen($_POST['birthday']) > 0 && 
strlen($_POST['gender']) > 0 && 
strlen($_POST['height']) > 0 &&  
strlen($_POST['weight']) > 0 &&  
strlen($_POST['email'])
){
	$datalist = array(
		'nickname' => $_POST['nickname'], 
		'mailaddress' => $_POST['email'], 
		'birthday' => $_POST['birthday'],
		'gender' => $_POST['gender'],
		'height' => $_POST['height'],
		'weight' => $_POST['weight']
		);

	$sql = "INSERT INTO u_user (";
	
	$count = 0;
	foreach ( $datalist as $key => $value ) {
	    $sql .= $key;
	
	    $count++;
	    if($count == count($datalist)){
	    	$sql .= ") ";
	    }else{
	    	$sql .= ", ";
	    }
	}
	
	$sql .= "VALUES ('";
	
	$count = 0;
	foreach ( $datalist as $key => $value ) {
	    $sql .= $value;
	
	    $count++;
	    if($count == count($datalist)){
	    	$sql .= ") ";
	    }else{
	    	if($key == 'nickname'){
	    		$sql .= "', '";
	    	} else if($key == 'mailaddress') {
	    		$sql .= "', ";
    		} else {
	    		$sql .= ", ";
	    	}
	    }
	}
	
	//echo $sql;
	
	$stmt = $pdo->query($sql);
	
	$lastInsertId = $pdo->lastInsertId();
	
	$stmt = null;
	
	$message_flg = "success";
	
	// 新規発行したIDをユーザーに通知
	mail($_POST['email'], "PainVR - 新規ID発行のお知らせ", "新規ID：$lastInsertId"."\nこちらのIDでログインして下さい。", "From: info@rikuty.co.jp");
	
} else if (count($_POST) != 0) {
	$message_flg = "error";
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
		echo '<center><font color="#0000FF" size="2">新規登録しました。<br>入力したメールアドレスに新規IDを発行しました。</font></center>';
		exit;
	}
	if($message_flg == 'error')
	{
		echo '<font color="#FF0000" size="2">入力情報に誤りがあります。</font>';
	}
?>
<center>
<form method="POST" action="">
<table id="as_table">
	<tr><td id="as_table_left">ニックネーム</td><td id="as_table_right"><input type="text" name="nickname"></td></tr>
	<tr><td id="as_table_left">生年月日</td><td id="as_table_right"><input type="text" name="birthday"></td></tr>
	<tr><td id="as_table_left">性別</td><td id="as_table_right">
		<input type="radio" name="gender" value="1" selected> 男
		<input type="radio" name="gender" value="0"> 女</td></tr>
	<tr><td id="as_table_left">身長</td><td id="as_table_right"><input type="text" name="height"></td></tr>
	<tr><td id="as_table_left">体重</td><td id="as_table_right"><input type="text" name="weight"></td></tr>
	<tr><td id="as_table_left">メールアドレス</td><td id="as_table_right"><input type="text" name="email"></td></tr>
	<tr><td colspan="2" align="center"><input type="submit" value="新規登録"></td></tr>
</table>
</form>
</center>
</div>

<div id="footer_line">©　Rikuty CO.,LTD.</div>
</body>
</html>