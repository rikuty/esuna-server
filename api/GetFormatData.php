<?php

require './../common/conf.php';

$sql = "SELECT user_id, CONCAT(last_name, ' ', first_name) as user_name, age, height, rank FROM u_user WHERE active = 10";
$stmt = $pdo->query($sql);

if($stmt->rowCount() == 0){
	// アクティブユーザー該当なし
	echo 0;
} else {
	$resultData = $stmt -> fetch(PDO::FETCH_ASSOC);

	$sql = "SELECT * FROM u_measure WHERE user_id = ".$resultData['user_id']." ORDER BY measure_date DESC LIMIT 10";
	$stmt = $pdo->query($sql);

	$measureData = array();
	$index = 1;
	while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
		$measureData[$index] = $row;
		$index++;
	}
	$resultData["measure"] = $measureData;

	//var_dump($resultData);
	echo json_encode($resultData, JSON_UNESCAPED_UNICODE);
}

?>