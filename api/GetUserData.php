<?php
require './../common/conf.php';

$sql = "SELECT * FROM u_user WHERE active = 10";
$stmt = $pdo->query($sql);

if($stmt->rowCount() == 0){
	// アクティブユーザー該当なし
	echo 0;
} else {
	$userData = $stmt -> fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT * FROM u_exercise WHERE user_id = ".$userData['user_id']." ORDER BY exercise_date DESC LIMIT 50";
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