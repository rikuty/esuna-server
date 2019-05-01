<?php
require_once("./conf.php");

$dsn = 'mysql:host='.SERVER_URL.';dbname='.DB_NAME.';charset=utf8';
try {
	$dbh = new PDO($dsn, USER_NAME, USER_PASS);
} catch (PDOException $e) {
	echo 'Cannot connect : ' . $e->getMessage();
	exit;
}

$user_id 			 = $_POST['user_id'];
$shoulder_height 	 = $_POST['shoulder_height'];
$arm_length 			 = $_POST['arm_length'];
$back_height 	 	 = $_POST['back_height'];

$sql = "UPDATE m_user SET ".
		"shoulder_height = ".$shoulder_height.", ".
		"arm_length = ".$arm_length.", ".
		"back_height = ".$back_height." ".
	   "WHERE user_id = ".$user_id;
$stmt = $dbh->prepare($sql);
$stmt->execute();

echo $sql;

$stmt = null;
$dbh = null;
?>