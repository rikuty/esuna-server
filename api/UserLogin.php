<?php

require './../common/conf.php';

//$userId = $_POST['user_id'];
$fid = $_POST['fid'];
$userId = 0;

// u_facilityのアクティブユーザーの確認（使用中の場合は離脱）
$sql = "SELECT active_user_id FROM u_facility WHERE facility_id = ".$fid;
$stmt = $pdo->query($sql);
$row = $stmt -> fetch(PDO::FETCH_ASSOC);
if($row['active_user_id'] != null) {
	$userId = $row['active_user_id'];
	//ログインユーザー情報の取得
	$sql = "SELECT * FROM u_user WHERE user_id = ".$userId;
	$stmt = $pdo->query($sql);
	
	if($stmt->rowCount() == 0){
		// アクティブユーザー該当なし
		echo 0;
	} else {
		$row = $stmt -> fetch(PDO::FETCH_ASSOC);
	
		echo json_encode($row, JSON_UNESCAPED_UNICODE);
	}
} else {
	// アクティブユーザー無し
	echo 0;
}

?>