<?php

require './../common/conf.php';

$userId = $_POST['user_id'];
$password = $_POST['password'];

$sql = "SELECT user_id, CONCAT(last_name, ' ', first_name) as user_name FROM u_user WHERE user_id = ".$userId." AND password = ".$password;
$stmt = $pdo->query($sql);

if($stmt->rowCount() == 0){
	// アクティブユーザー該当なし
	echo 0;
} else {
	$row = $stmt -> fetch(PDO::FETCH_ASSOC);

	echo json_encode($row, JSON_UNESCAPED_UNICODE);
}

?>