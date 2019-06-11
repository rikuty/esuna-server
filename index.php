<?php

//POSTで送りたいデータ
$query = array(
	'code' => '4/ZgHubrIFr2Koh6bOC1ygUfPWR6FeSUbPr5qumG9SfscAXc2rFbevHyVPY6luGQdyuAaSRnX6D3QOraH1P3ppx30', 
	'client_id' => '761889929248-3p2k0kdbqd031qjtggu7j8sp304kbp05.apps.googleusercontent.com', 
	'client_secret' => 'p8CBimeORqwqw2129N8h5i2u',
	'redirect_uri' => 'http://dev.rikuty.net',
	'grant_type' => 'authorization_code'
);
 
//URLエンコードされたクエリ文字列を生成
$content = http_build_query($query, '', '&');
 
//ヘッダ設定
$header = array(
	'Content-Type: application/x-www-form-urlencoded', //form送信の際、クライアントがWebサーバーに送信するコンテンツタイプ
);
 
//ストリームコンテキスト設定
$context = array(
	'http' => array(
		'ignore_errors' => true, //ステータスコードが失敗を意味する場合でもコンテンツを取得
		'method' => 'POST', //メソッド。デフォルトはGET
		'header' => implode("\r\n", $header), //ヘッダ設定
		'content' => $content //送信したいデータ
	)
);
$url = 'https://www.googleapis.com/oauth2/v4/token';
$res = file_get_contents($url, false, stream_context_create($context));

echo('<pre>');
var_dump($res);
echo('</pre>');

?>