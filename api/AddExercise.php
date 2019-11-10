<?php

require './../common/conf.php';
/*
$datalist = array(
	'user_id' => $_POST['user_id'], 
	'exercise_date' => 'NOW()', 
	'neck_age' => $_POST['neck_age'],
	'back_age' => $_POST['back_age'],
	'exercise1_name' => $_POST['exercise1_name'],
	'exercise1_count' => $_POST['exercise1_count'],
	'exercise1_success_rate' => $_POST['exercise1_success_rate']
	);
*/
$datalist = array(
	'user_id' => 1, 
	'exercise_date' => 'NOW()', 
	'neck_age' => 55,
	'back_age' => 55,
	'exercise1_name' => '"sample2"',
	'exercise1_count' => 5,
	'exercise1_success_rate' => 0.77
	);

$sql = "INSERT INTO u_exercise (";

$count = 0;
foreach ( $datalist as $key => $value ) {
    $sql .= $key;

    $count++;
    if($count == count($datalist)){
    	$sql .= ") ";
    }else{
    	$sql .= ", ";
    }
}

$sql .= "VALUES (";

$count = 0;
foreach ( $datalist as $key => $value ) {
    $sql .= $value;

    $count++;
    if($count == count($datalist)){
    	$sql .= ") ";
    }else{
    	$sql .= ", ";
    }
}

//echo $sql;

$stmt = $pdo->query($sql);
$stmt = null;

?>