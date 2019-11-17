<?php

require './../common/conf.php';

$userId = $_POST['uid'];

$sql = "SELECT * FROM u_user WHERE user_id = ".$userId;
$stmt = $pdo->query($sql);

if($stmt->rowCount() != 0) {
	$row = $stmt -> fetch(PDO::FETCH_ASSOC);
	echo json_encode($row, JSON_UNESCAPED_UNICODE);
} else {
	// データ無し
	echo 0;
}

?>