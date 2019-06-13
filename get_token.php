<?php

$url = 'https://www.googleapis.com/oauth2/v4/token';
$data = [];

// $dataに送るデータを詰めます。
$data['code'] = '4/aAHP-3C50FXG2TdSyC-RsxSr_K9nIkFmjpxnwg3SQDfANi8-McnqxzY';
$data['client_id'] = '761889929248-hec2iu2qn5ae35qefm1ji0htu0lmhjmd.apps.googleusercontent.com';
$data['client_secret'] = 'F3Zva_8sFjFUiuHtjWnD-8Cc';
$data['redirect_uri'] = 'urn:ietf:wg:oauth:2.0:oob';
$data['grant_type'] = 'authorization_code';
$data['access_type'] = 'offline';

// 送信データをURLエンコード
$data = http_build_query($data, "", "&");

// curlを初期化
$ch = curl_init();

// 設定!
curl_setopt($ch, CURLOPT_URL, $url); // 送り先
curl_setopt($ch, CURLOPT_POST, true); // POSTです
curl_setopt($ch, CURLOPT_POSTFIELDS, $data); // 送信データ
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果取得の設定

// 実行！
$res = curl_exec($ch);

var_dump($res);

// リソースを閉じる
curl_close($ch);


/*
//POSTで送りたいデータ
$query = array(
	'code' => '4/aAHP-3C50FXG2TdSyC-RsxSr_K9nIkFmjpxnwg3SQDfANi8-McnqxzY',
	'client_id' => '761889929248-hec2iu2qn5ae35qefm1ji0htu0lmhjmd.apps.googleusercontent.com', 
	'client_secret' => 'F3Zva_8sFjFUiuHtjWnD-8Cc', 
	'redirect_uri' => 'urn:ietf:wg:oauth:2.0:oob',
	'grant_type' => 'authorization_code',
	'access_type' => 'offline',
);

//URLエンコードされたクエリ文字列を生成
$content = http_build_query($query, '', '&');

//ヘッダ設定
$header = array(
	'Content-Type: application/x-www-form-urlencoded', 
);

 
//ストリームコンテキスト設定
$context = array(
	'http' => array(
		'ignore_errors' => true, //ステータスコードが失敗を意味する場合でもコンテンツを取得
		'method' => 'POST', //メソッド。デフォルトはGET
		//'header' => implode("\r\n", $header) //ヘッダ設定
	)
);
$url = 'https://www.googleapis.com/oauth2/v4/token';
$res = file_get_contents($url, false, stream_context_create($context));

echo('<pre>');
var_dump($res);
echo('</pre>');
*/
?>