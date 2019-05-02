<?php

require './../common/conf.php';

$user_id 			 = $_POST['user_id'];
//$shoulder_height 	 = $_POST['shoulder_height'];
//$arm_length 			 = $_POST['arm_length'];
//$back_height 	 	 = $_POST['back_height'];

$sql = "UPDATE m_result SET ".
		"shoulder_height = ".$shoulder_height.", ".
		"arm_length = ".$arm_length.", ".
		"back_height = ".$back_height." ".
	   "WHERE user_id = ".$user_id;

$stmt = $pdo->query($sql);
$stmt->execute();

echo $sql;

$stmt = null;
$dbh = null;
?>