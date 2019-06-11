<?php

//POSTで送りたいデータ
$query = array(
	'printerId' => 'cb69ed03-b40b-7f6c-1c21-aef97985cfd6', 
	'title' => 'LICENSE.txt', 
	'contentType' => 'url',
	'content' => 'LICENSE.txt',
	'ticket' => {"version":"1.0","print":{}}
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
$url = 'https://www.google.com/cloudprint/submit';
$res = file_get_contents($url, false, stream_context_create($context));

echo('<pre>');
var_dump($res);
echo('</pre>');

?>