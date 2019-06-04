<?php

require './../common/conf.php';

// 画像形式確認
if ($_FILES["file"]["type"] == "image/png") {

	$uploadFile = "/var/www/user_result/".$_POST['user_id']."/".$_FILES["file"]["name"];

    if ($_FILES["file"]["error"] > 0) {
        error_log("Return Code:" . $_FILES["file"]["error"], 3, "/var/www/debug.log");
        Return;
    } else {
        //echo "Upload:" . $_FILES["file"]["name"] . "";
        //echo "Type:" . $_FILES["file"]["type"] . "";
        //echo "Size:" . ($_FILES["file"]["size"] / 1024) . "Kb";
        //echo "Temp file:" . $_FILES["file"]["tmp_name"] . "";

        // ディレクトリ存在確認 -> 無ければ作成
        if (!file_exists("/var/www/user_result/".$_POST['user_id'])) {
			error_log("Make dir", 3, "/var/www/debug.log");
            mkdir("/var/www/user_result/".$_POST['user_id'], 0777);
        }

        move_uploaded_file($_FILES["file"]["tmp_name"], $uploadFile);
    }
}


// 登録内容を連想配列で生成
$datalist = array(
	
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
	
	);

// 最新レコードに対して更新
$sql = "UPDATE u_measure SET ";

$count = 0;
foreach ( $datalist as $key => $value ) {
    $sql .= $key." = ".$value;

    $count++;
    if($count < count($datalist)){
    	$sql .= ", ";
    }
}
$sql .= " WHERE user_id = ".$_POST['user_id']." ORDER BY measure_date DESC LIMIT 1";

//echo $sql;

$stmt = $pdo->query($sql);
$stmt = null;
?>