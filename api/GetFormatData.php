<?php

require './../common/conf.php';

$resultData = $stmt -> fetch(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM u_measure WHERE user_id = ".$_POST['user_id']." ORDER BY measure_date DESC LIMIT 20";
$stmt = $pdo->query($sql);

$row = $stmt -> fetch(PDO::FETCH_ASSOC);
echo json_encode($row, JSON_UNESCAPED_UNICODE);

?>