<?php

$url = 'https://www.googleapis.com/oauth2/v4/token';
$data = [];

// $data
$data['code'] = '4/aAH-xoYC2tMlLWCnJsmZeM3-P5xtg0sDmiNlswYbMLUTkUyj-y7K5uA';
$data['client_id'] = '761889929248-hec2iu2qn5ae35qefm1ji0htu0lmhjmd.apps.googleusercontent.com';
$data['client_secret'] = 'F3Zva_8sFjFUiuHtjWnD-8Cc';
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

echo "\n";
var_dump($res);
echo "\n";

// リソースを閉じる
curl_close($ch);

// アクセストークン、リフレッシュトークンを保管
$access_token = $res['access_token'];
$refresh_token = $res['refresh_token'];


//ヘッダ設定
$header = array(
        'Authorization: OAuth '.$access_token, //form送信の際、クライアントがWebサーバーに送信するコンテンツタイプ
);

//ストリームコンテキスト設定
$context = array(
        'http' => array(
                'ignore_errors' => true, //ステータスコードが失敗を意味する場合でもコンテンツを取得
                'method' => 'GET', //メソッド。デフォルトはGET
                'header' => implode("\r\n", $header) //ヘッダ設定
        )
);
$url = 'https://www.google.com/cloudprint/search';
$res = file_get_contents($url, false, stream_context_create($context));

echo "\n";
var_dump($res);
echo "\n";

?>