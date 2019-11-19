<?php

require './../common/UtilClass.php';

// 登録内容を連想配列で生成

$datalist = array(
	'oculus_user_id' => UtilClass::FormatVarchar($_POST['oculus_user_id']), 
	'oculus_user_name' => UtilClass::FormatVarchar($_POST['oculus_user_name'])
	);
	
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

$datalist['create_date'] = 'NOW()';
$datalist['update_date'] = 'NOW()';

// 新規レコード追加(+ 診断データ更新)

$sql = "INSERT INTO u_user (";

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

$stmt = $pdo->query($sql);
$stmt = null;

//生成されたuser_id返却
echo $pdo->lastInsertId();

?>