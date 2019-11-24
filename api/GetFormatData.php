<?php

require './../common/conf.php';

$user_id = $_POST['user_id'];

$sql = "SELECT * FROM u_measure WHERE user_id = ".$user_id." ORDER BY measure_date DESC LIMIT 20";
$stmt = $pdo->query($sql);

$measureData = array();
$index = 1;
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
	$measureData[$index] = $row;
	$index++;
}

echo json_encode($measureData, JSON_UNESCAPED_UNICODE);

?>