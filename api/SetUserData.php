<?php

require './../common/UtilClass.php';

// 登録内容を連想配列で生成

$datalist = array();

if(isset($_POST['oculus_user_id'])){
	$datalist['oculus_user_id'] = UtilClass::FormatVarchar($_POST['oculus_user_id']);
}
if(isset($_POST['oculus_user_name'])){
	$datalist['oculus_user_name'] = UtilClass::FormatVarchar($_POST['oculus_user_name']);
}
if(isset($_POST['facility_id'])){
	$datalist['facility_id'] = $_POST['facility_id'];
}
if(isset($_POST['mailaddress'])){
	$datalist['mailaddress'] = UtilClass::FormatVarchar($_POST['mailaddress']);
}
if(isset($_POST['age'])){
	$datalist['age'] = $_POST['age'];
}
if(isset($_POST['birthday'])){
	$datalist['birthday'] = UtilClass::FormatVarchar($_POST['birthday']);
}
if(isset($_POST['gender'])){
	$datalist['gender'] = $_POST['gender'];
}
if(isset($_POST['height'])){
	$datalist['height'] = $_POST['height'];
}
if(isset($_POST['weight'])){
	$datalist['weight'] = $_POST['weight'];
}

$datalist['update_date'] = 'NOW()';

$sql = "UPDATE u_user SET ";

$count = 0;
foreach ( $datalist as $key => $value ) {
    $sql .= $key." = ".$value;

    $count++;
    if($count < count($datalist)){
    	$sql .= ", ";
    }
}
$sql .= " WHERE user_id = ".$_POST['user_id'];

//echo $sql;

$stmt = $pdo->query($sql);
$stmt = null;
/*
$datalist = array(
	'user_id' => $_POST['user_id'], 
	'measure_date' => 'NOW()', 
	'max_rom_measure_1' => $_POST['max_rom_measure_1'],
	'max_rom_measure_2' => $_POST['max_rom_measure_2'],
	'max_rom_measure_3' => $_POST['max_rom_measure_3'],
	'max_rom_measure_4' => $_POST['max_rom_measure_4'],
	'max_rom_measure_5' => $_POST['max_rom_measure_5'],
	'max_rom_measure_6' => $_POST['max_rom_measure_6'],
	'max_rom_measure_7' => $_POST['max_rom_measure_7'],
	'max_rom_measure_8' => $_POST['max_rom_measure_8'],
	'pre_rest_pain' => $_POST['pre_rest_pain'], 
	'pre_move_pain' => $_POST['pre_move_pain'], 
	'pre_move_fear' => $_POST['pre_move_fear']
	);

// 新規レコード追加(+ 診断データ更新)

$sql = "INSERT INTO u_measure (";

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
*/
?>