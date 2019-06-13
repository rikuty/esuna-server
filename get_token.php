<?php

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

?>