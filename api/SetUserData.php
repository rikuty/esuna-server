<?php

require './../common/conf.php';

$user_id 	= $_POST['user_id'];
$last_name 	= $_POST['last_name'];
$first_name = $_POST['first_name'];
$age 	 	= $_POST['age'];

$sql = "UPDATE u_user SET ".
		"last_name = '".$last_name."', ".
		"first_name = '".$first_name."', ".
		"age = ".$age." ".
	   "WHERE user_id = ".$user_id;

$stmt = $pdo->query($sql);
$stmt->execute();

echo $sql;

$stmt = null;
?>