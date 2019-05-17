<?php

require './../common/conf.php';

// 登録内容を連想配列で生成
$datalist = array(
	/*
	'max_rom_exercise_1' => $_POST['max_rom_exercise_1'],
	'max_rom_exercise_2' => $_POST['max_rom_exercise_2'],
	'max_rom_exercise_3' => $_POST['max_rom_exercise_3'],
	'max_rom_exercise_4' => $_POST['max_rom_exercise_4'],
	'max_rom_exercise_5' => $_POST['max_rom_exercise_5'],
	'max_rom_exercise_6' => $_POST['max_rom_exercise_6'],
	'max_rom_exercise_7' => $_POST['max_rom_exercise_7'],
	'max_rom_exercise_8' => $_POST['max_rom_exercise_8'],
	'average_max_rom' => $_POST['average_max_rom'], 
	'average_time_1' => $_POST['average_time_1'],
	'average_time_2' => $_POST['average_time_2'],
	'average_time_3' => $_POST['average_time_3'],
	'average_time_4' => $_POST['average_time_4'],
	'average_time_5' => $_POST['average_time_5'],
	'average_time_6' => $_POST['average_time_6'],
	'average_time_7' => $_POST['average_time_7'],
	'average_time_8' => $_POST['average_time_8'],
	'appraisal_value_1' => $_POST['appraisal_value_1'],
	'appraisal_value_2' => $_POST['appraisal_value_2'],
	'appraisal_value_3' => $_POST['appraisal_value_3'],
	'appraisal_value_4' => $_POST['appraisal_value_4'],
	'appraisal_value_5' => $_POST['appraisal_value_5'],
	'appraisal_value_6' => $_POST['appraisal_value_6'],
	'appraisal_value_7' => $_POST['appraisal_value_7'],
	'appraisal_value_8' => $_POST['appraisal_value_8'],
	'post_rest_pain' => $_POST['post_rest_pain'], 
	'post_move_pain' => $_POST['post_move_pain'], 
	'post_move_fear' => $_POST['post_move_fear'],
	'point' => $_POST['point'], 
	'rom_value' => $_POST['rom_value'], 
	'point_value' => $_POST['point_value']
	*/


	'max_rom_exercise_1' => 44,
	'max_rom_exercise_2' => 44,
	'max_rom_exercise_3' => 44,
	'max_rom_exercise_4' => 44,
	'max_rom_exercise_5' => 44,
	'max_rom_exercise_6' => 44,
	'max_rom_exercise_7' => 44,
	'max_rom_exercise_8' => 44,
	'average_max_rom' => 44,
	'average_time_1' => 10,
	'average_time_2' => 10,
	'average_time_3' => 10,
	'average_time_4' => 10,
	'average_time_5' => 10,
	'average_time_6' => 10,
	'average_time_7' => 10,
	'average_time_8' => 10,
	'appraisal_value_1' => 3,
	'appraisal_value_2' => 3,
	'appraisal_value_3' => 3,
	'appraisal_value_4' => 3,
	'appraisal_value_5' => 3,
	'appraisal_value_6' => 3,
	'appraisal_value_7' => 3,
	'appraisal_value_8' => 3,
	'post_rest_pain' => 5,
	'post_move_pain' => 3,
	'post_move_fear' => 3,
	'point' => 6666,
	'rom_value' => 22,
	'point_value' => 22

	);

// 最新レコードに対して更新
$sql = "UPDATE m_measure SET ";

$count = 0;
foreach ( $datalist as $key => $value ) {
    $sql .= $key." = ".$value;

    $count++;
    if($count < count($datalist)){
    	$sql .= ", ";
    }
}
$sql .= "WHERE user_id = ".$_POST['user_id']." ORDER BY measure_date DESC LIMIT 1";

$stmt = $pdo->query($sql);

echo $sql;

$stmt = null;
$dbh = null;
?>