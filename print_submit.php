<?php

$img = file_get_contents('/var/www/user_result/1/ResultSheet.png');

//POSTで送りたいデータ
$query = array(
	'printerId' => 'cb69ed03-b40b-7f6c-1c21-aef97985cfd6', 
	'title' => 'title', 
	'contentType' => 'image/png',
	'content' => $img,
	'ticket' => '{"version":"1.0","print":{"vendor_ticket_item":[],"color":{"type":"STANDARD_MONOCHROME"},"copies":{"copies":1}}}'
);
 
//URLエンコードされたクエリ文字列を生成
$content = http_build_query($query, '', '&');


//ヘッダ設定
$header = array(
	//'Content-Type: application/x-www-form-urlencoded', //form送信の際、クライアントがWebサーバーに送信するコンテンツタイプ
	'Content-Type: image/png'
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