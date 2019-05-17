<?php

require './../common/conf.php';

// 登録内容を連想配列で生成
/*$datalist = array(
	'user_id' => $_POST['user_id'], 
	'measure_date' => date("Y-m-d H:i:s"), 
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
	);*/
$datalist = array(
	'user_id' => 1, 
	//'measure_date' => date("Y-m-d H:i:s"), 
	'measure_date' => 'NOW()', 
	'max_rom_measure_1' => 44,
	'max_rom_measure_2' => 44,
	'max_rom_measure_3' => 44,
	'max_rom_measure_4' => 44,
	'max_rom_measure_5' => 44,
	'max_rom_measure_6' => 44,
	'max_rom_measure_7' => 44,
	'max_rom_measure_8' => 44,
	'pre_rest_pain' => 5,
	'pre_move_pain' => 5,
	'pre_move_fear' => 5
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
?>