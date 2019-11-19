<?php

require './../common/conf.php';

$ouid = $_POST['ouid'];

$sql = "SELECT * FROM u_user WHERE oculus_user_id = ".$ouid;
$stmt = $pdo->query($sql);

if($stmt->rowCount() != 0) {
	$row = $stmt -> fetch(PDO::FETCH_ASSOC);
	echo json_encode($row, JSON_UNESCAPED_UNICODE);
} else {
	// データ無し
	echo 0;
}

?>