<?php

require './../common/UtilClass.php';

$datalist = array(
	'user_id' => $_POST['user_id'], 
	'neck_age' => $_POST['neck_age'],
	'back_age' => $_POST['back_age'],
	'exercise1_name' => UtilClass::FormatVarchar($_POST['exercise1_name']),
	'exercise1_count' => $_POST['exercise1_count'],
	'exercise1_success_rate' => $_POST['exercise1_success_rate'],
	'exercise2_name' => UtilClass::FormatVarchar($_POST['exercise2_name']),
	'exercise2_count' => $_POST['exercise2_count'],
	'exercise2_success_rate' => $_POST['exercise2_success_rate'],
	'exercise3_name' => UtilClass::FormatVarchar($_POST['exercise3_name']),
	'exercise3_count' => $_POST['exercise3_count'],
	'exercise3_success_rate' => $_POST['exercise3_success_rate'],
	'exercise4_name' => UtilClass::FormatVarchar($_POST['exercise4_name']),
	'exercise4_count' => $_POST['exercise4_count'],
	'exercise4_success_rate' => $_POST['exercise4_success_rate'],
	'body_pain' => $_POST['body_pain'],
	'exercise_date' => 'NOW()', 
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