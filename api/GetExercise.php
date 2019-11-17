<?php

require './../common/conf.php';

$userId = $_POST['uid'];

$sql = "SELECT * FROM u_exercise WHERE user_id = ".$userId." ORDER BY exercise_date DESC LIMIT 20";
$stmt = $pdo->query($sql);

if($stmt->rowCount() != 0) {
	$exerciseData = array();
	$index = 1;
	while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
		$exerciseData[$index] = $row;
		$index++;
	}
	
	echo json_encode($exerciseData, JSON_UNESCAPED_UNICODE);
} else {
echo "F";
	// データ無し
	echo 0;
}

?>