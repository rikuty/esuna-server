<?php

require '/var/www/html/common/conf.php';

if(!array_key_exists("facility_id", $_GET)){
	exit('facility_idを指定してください');
}
if(!array_key_exists("client_id", $_GET)){
	exit('client_idを指定してください');
}
if(!array_key_exists("client_secret", $_GET)){
	exit('client_secretを指定してください');
}
if(!array_key_exists("authcode", $_GET)){
	exit('authcodeを指定してください');
}

$facility_id = $_GET["facility_id"];
$client_id = $_GET["client_id"];
$client_secret = $_GET["client_secret"];
$authorization_code = $_GET["authcode"];

echo "<pre>";
var_dump($_GET);
echo "<pre>";
/******************************************************************************************************************/
/********************************************* アクセストークン取得 **************************************************/
/******************************************************************************************************************/
$url = 'https://www.googleapis.com/oauth2/v4/token';
$data = [];

// $data
$data['code'] = $authorization_code;
$data['client_id'] = $client_id;
$data['client_secret'] = $client_secret;
$data['redirect_uri'] = 'urn:ietf:wg:oauth:2.0:oob';
$data['grant_type'] = 'authorization_code';
$data['access_type'] = 'offline';

// curlを初期化
$ch = curl_init();

// 設定
curl_setopt($ch, CURLOPT_URL, $url); // 送り先
curl_setopt($ch, CURLOPT_POST, true); // POSTです
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // 送信データ
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果取得の設定

// 実行
$res = curl_exec($ch);
$token_obj = json_decode($res);

echo "<pre>";
var_dump($token_obj);
echo "<pre>";

// リソースを閉じる
curl_close($ch);

// リフレッシュトークンを保管
$refresh_token = $token_obj->refresh_token;

$sql = 'UPDATE u_facility SET refresh_token = "'.$refresh_token.'", client_id = "'.$client_id.'", client_secret = "'.$client_secret.'" WHERE facility_id = '.$facility_id.' LIMIT 1';

$stmt = $pdo->query($sql);
$stmt = null;
$ch = null;
$res = null;
$token_obj = null;

?>
