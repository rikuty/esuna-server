<?php

require './../common/conf.php';

$sql = "SELECT * FROM u_user WHERE active = 10";
$stmt = $pdo->query($sql);

if($stmt->rowCount() == 0){
	// アクティブユーザー該当なし
	echo 0;
} else {
	$row = $stmt -> fetch(PDO::FETCH_ASSOC);

	echo json_encode($row, JSON_UNESCAPED_UNICODE);
}

?>