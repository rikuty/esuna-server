<?php

require './../common/UtilClass.php';

// 登録内容を連想配列で生成
$datalist = array(
	'user_id' => $_POST['user_id'],
	'measure_date' => 'NOW()',
	'neck_age' => $_POST['neck_age'],
	'back_age' => $_POST['back_age'],
	'SitNeckLeftPain' => $_POST['SitNeckLeftPain'],
	'SitNeckRightPain' => $_POST['SitNeckRightPain'],
	'SitNeckCenterPain' => $_POST['SitNeckCenterPain'],
	'SitBackLeftPain' => $_POST['SitBackLeftPain'],
	'SitBackRightPain' => $_POST['SitBackRightPain'],
	'SitBackCenterPain' => $_POST['SitBackCenterPain'],
	'StandNeckLeftPain' => $_POST['StandNeckLeftPain'],
	'StandNeckRightPain' => $_POST['StandNeckRightPain'],
	'StandNeckCenterPain' => $_POST['StandNeckCenterPain'],
	'StandBackLeftPain' => $_POST['StandBackLeftPain'],
	'StandBackRightPain' => $_POST['StandBackRightPain'],
	'StandBackCenterPain' => $_POST['StandBackCenterPain'],
	'NeckLeftRotationAxis' => $_POST['NeckLeftRotationAxis'],
	'NeckLeftRotationLeftPain' => $_POST['NeckLeftRotationLeftPain'],
	'NeckLeftRotationRightPain' => $_POST['NeckLeftRotationRightPain'],
	'NeckLeftRotationCenterPain' => $_POST['NeckLeftRotationCenterPain'],
	'NeckRightRotationAxis' => $_POST['NeckRightRotationAxis'],
	'NeckRightRotationLeftPain' => $_POST['NeckRightRotationLeftPain'],
	'NeckRightRotationRightPain' => $_POST['NeckRightRotationRightPain'],
	'NeckRightRotationCenterPain' => $_POST['NeckRightRotationCenterPain'],
	'NeckFlexionAxis' => $_POST['NeckFlexionAxis'],
	'NeckFlexionLeftPain' => $_POST['NeckFlexionLeftPain'],
	'NeckFlexionRightPain' => $_POST['NeckFlexionRightPain'],
	'NeckFlexionCenterPain' => $_POST['NeckFlexionCenterPain'],
	'NeckExtentionAxis' => $_POST['NeckExtentionAxis'],
	'NeckExtentionLeftPain' => $_POST['NeckExtentionLeftPain'],
	'NeckExtentionRightPain' => $_POST['NeckExtentionRightPain'],
	'NeckExtentionCenterPain' => $_POST['NeckExtentionCenterPain'],
	'NeckLeftBendAxis' => $_POST['NeckLeftBendAxis'],
	'NeckLeftBendLeftPain' => $_POST['NeckLeftBendLeftPain'],
	'NeckLeftBendRightPain' => $_POST['NeckLeftBendRightPain'],
	'NeckLeftBendCenterPain' => $_POST['NeckLeftBendCenterPain'],
	'NeckRightBendAxis' => $_POST['NeckRightBendAxis'],
	'NeckRightBendLeftPain' => $_POST['NeckRightBendLeftPain'],
	'NeckRightBendRightPain' => $_POST['NeckRightBendRightPain'],
	'NeckRightBendCenterPain' => $_POST['NeckRightBendCenterPain'],
	'BackLeftRotationAxis' => $_POST['BackLeftRotationAxis'],
	'BackLeftRotationLeftPain' => $_POST['BackLeftRotationLeftPain'],
	'BackLeftRotationRightPain' => $_POST['BackLeftRotationRightPain'],
	'BackLeftRotationCenterPain' => $_POST['BackLeftRotationCenterPain'],
	'BackRightRotationAxis' => $_POST['BackRightRotationAxis'],
	'BackRightRotationLeftPain' => $_POST['BackRightRotationLeftPain'],
	'BackRightRotationRightPain' => $_POST['BackRightRotationRightPain'],
	'BackRightRotationCenterPain' => $_POST['BackRightRotationCenterPain'],
	'BackFlexionAxis' => $_POST['BackFlexionAxis'],
	'BackFlexionLeftPain' => $_POST['BackFlexionLeftPain'],
	'BackFlexionRightPain' => $_POST['BackFlexionRightPain'],
	'BackFlexionCenterPain' => $_POST['BackFlexionCenterPain'],
	'BackExtentionAxis' => $_POST['BackExtentionAxis'],
	'BackExtentionLeftPain' => $_POST['BackExtentionLeftPain'],
	'BackExtentionRightPain' => $_POST['BackExtentionRightPain'],
	'BackExtentionCenterPain' => $_POST['BackExtentionCenterPain'],
	'BackLeftBendAxis' => $_POST['BackLeftBendAxis'],
	'BackLeftBendLeftPain' => $_POST['BackLeftBendLeftPain'],
	'BackLeftBendRightPain' => $_POST['BackLeftBendRightPain'],
	'BackLeftBendCenterPain' => $_POST['BackLeftBendCenterPain'],
	'BackRightBendAxis' => $_POST['BackRightBendAxis'],
	'BackRightBendLeftPain' => $_POST['BackRightBendLeftPain'],
	'BackRightBendRightPain' => $_POST['BackRightBendRightPain'],
	'BackRightBendCenterPain' => $_POST['BackRightBendCenterPain'],
	'NeckAnswerSpeed' => $_POST['NeckAnswerSpeed'],
	'NeckAllDirectionSpeed' => $_POST['NeckAllDirectionSpeed'],
	'NeckRightRotationSpeed' => $_POST['NeckRightRotationSpeed'],
	'NeckLeftRotationSpeed' => $_POST['NeckLeftRotationSpeed'],
	'NeckFlectionSpeed' => $_POST['NeckFlectionSpeed'],
	'NeckExtentionSpeed' => $_POST['NeckExtentionSpeed'],
	'NeckLeftBendSpeed' => $_POST['NeckLeftBendSpeed'],
	'NeckRightBendSpeed' => $_POST['NeckRightBendSpeed'],
	'BackAnswerSpeed' => $_POST['BackAnswerSpeed'],
	'BackAllDirectionSpeed' => $_POST['BackAllDirectionSpeed'],
	'BackRightRotationSpeed' => $_POST['BackRightRotationSpeed'],
	'BackLeftRotationSpeed' => $_POST['BackLeftRotationSpeed'],
	'BackFlectionSpeed' => $_POST['BackFlectionSpeed'],
	'BackExtentionSpeed' => $_POST['BackExtentionSpeed'],
	'BackLeftBendSpeed' => $_POST['BackLeftBendSpeed'],
	'BackRightBendSpeed' => $_POST['BackRightBendSpeed'],
	'NeckMoveFear' => $_POST['NeckMoveFear'],
	'BackMoveFear' => $_POST['BackMoveFear'],
	'create_date' => 'NOW()'
	
	);

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

echo $sql;

$stmt = $pdo->query($sql);
$stmt = null;
?>