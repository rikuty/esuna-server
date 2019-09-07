<?php
require_once("/var/www/html/common/conf.php");

class UtilClass
{
	public static function loginFacility($uid, $fid) {
		global $pdo;
		
		$message_flg = '';
		
		// ユーザーの存在確認(いなければ離脱)
		$sql = "SELECT * FROM u_user WHERE user_id = ".$uid;
		$stmt = $pdo->query($sql);
		if($stmt->rowCount() == 0) {
			$message_flg = "ユーザーIDが存在しません。";
		} else {
			$stmt = null;
			
			// u_facilityのアクティブユーザーの確認（使用中の場合は離脱）
			$sql = "SELECT active_user_id FROM u_facility WHERE facility_id = ".$fid;
			$stmt = $pdo->query($sql);
			$row = $stmt -> fetch(PDO::FETCH_ASSOC);
			if($row['active_user_id'] != null) {
				$message_flg = "現在施設は利用中です。";
			} else {
				$stmt = null;
				// u_facilityにアクティブユーザーを設定
				$sql = "UPDATE u_facility SET active_user_id = ".$uid." WHERE facility_id = ".$fid;
				$stmt = $pdo->query($sql);
				
				$stmt = null;
				
				// u_facility_logに登録
				$sql = "INSERT INTO u_facility_log (facility_id, user_id, login_date) VALUES (".$fid.", ".$uid.", NOW())";
				$stmt = $pdo->query($sql);
				
				$stmt = null;
				
				$message_flg = 'success';
			}
		}
		
		return $message_flg;
	}

	public static function logoutFacility($uid, $fid) {
		global $pdo;
	}

}

//$util = new UtilClass;

?>
