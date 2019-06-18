<?php

/******************************************************************************************************************/
/********************************************* アクセストークン取得 **************************************************/
/******************************************************************************************************************/

$url = 'https://www.googleapis.com/oauth2/v4/token';
$data = [];

// $data
$data['code'] = file_get_contents("authorization_code.txt");
$data['client_id'] = '819193872087-id01qp1ueeahujtifpelrkculol2t279.apps.googleusercontent.com';
$data['client_secret'] = 'UU9mauUdktTiDPd8jA7E_Fmk';
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

echo "\n";
var_dump($token_obj);
echo "\n";

// リソースを閉じる
curl_close($ch);

// リフレッシュトークンを保管
$refresh_token = $token_obj->refresh_token;
file_put_contents("refresh_token.txt", $refresh_token);

$ch = null;
$res = null;
$token_obj = null;

?>
