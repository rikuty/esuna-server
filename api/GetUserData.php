<?php
require './../common/conf.php';

$userId = $_POST['user_id'];

$sql = "SELECT * FROM u_user WHERE user_id = ".$userId;
$stmt = $pdo->query($sql);

if($stmt->rowCount() == 0){
	// アクティブユーザー該当なし
	echo 0;
} else {
	$userData = $stmt -> fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT * FROM u_exercise WHERE user_id = ".$userId." ORDER BY exercise_date DESC LIMIT 50";
	$stmt = $pdo->query($sql);

	$exerciseData = array();
	$index = 1;
	while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
		$exerciseData[$index] = $row;
		$index++;
	}
	
	$userData["exercise"] = $exerciseData;

	//var_dump($resultData);
	echo json_encode($userData, JSON_UNESCAPED_UNICODE);
}
?>