<?php

$acces_token = "ya29.GlslB38_yAcf3SFDbIgOZesXXquwNvUmndyGqd49lOchgOvO2mul4CB5vJBNzsTPC9OhQ7bTyoPp2AHc6UQD_XIYwep6CEOlPRgmgXWM8f5Pr-0TAoaSoCBT3-G_";

//ヘッダ設定
$header = array(
	'Authorization: OAuth '.$acces_token, //form送信の際、クライアントがWebサーバーに送信するコンテンツタイプ
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

echo('<pre>');
var_dump($res);
echo('</pre>');

?>