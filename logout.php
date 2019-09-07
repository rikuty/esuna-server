<?php 
ini_set("display_errors", 1);
error_reporting(E_ALL);
require_once("./common/UtilClass.php");

$sql = "UPDATE u_facility SET active_user_id = null";
$stmt = $pdo->query($sql);

echo "ログアウトしました";

?>