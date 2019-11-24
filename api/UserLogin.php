<?php

require './../common/conf.php';

$ouid = $_POST['oculus_user_id'];

$sql = "SELECT * FROM u_user WHERE oculus_user_id = ".$ouid;
$stmt = $pdo->query($sql);

if($stmt->rowCount() > 1) {
	// 施設内の複数ユーザー対応
	
	// 施設ID取得
	$urow = $stmt -> fetch(PDO::FETCH_ASSOC);
	$fid = $urow["facility_id"];
	
	$sql = "SELECT active_user_id FROM u_facility WHERE facility_id = ".$fid;
	$stmt = $pdo->query($sql);
	$frow = $stmt -> fetch(PDO::FETCH_ASSOC);
	$uid = $frow["active_user_id"];
	
	if($uid != null){
		$sql = "SELECT * FROM u_user WHERE user_id = ".$uid;
		$stmt = $pdo->query($sql);
		$targetRow = $stmt -> fetch(PDO::FETCH_ASSOC);
		echo json_encode($targetRow, JSON_UNESCAPED_UNICODE);
	} else {
		// 不明なエラー
		echo 99;
	}
	
} else if($stmt->rowCount() == 1) {
	// 一人検索
	$row = $stmt -> fetch(PDO::FETCH_ASSOC);
	echo json_encode($row, JSON_UNESCAPED_UNICODE);
} else {
	// データ無し
	echo 0;
}

?>