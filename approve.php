<?php

//POSTで送りたいデータ
$query = array(
	'code' => '4/ZgGCde1Z_L68wbi0tICA16djYInHgYgcSWHJz8Fgm1mX1rVXW35iFk8mcpqtMYFTPtyYW-_fHHxLTLrsaPaWHYc', 
	'client_id' => '761889929248-3p2k0kdbqd031qjtggu7j8sp304kbp05.apps.googleusercontent.com', 
	'client_secret' => 'p8CBimeORqwqw2129N8h5i2u',
	'redirect_uri' => 'http://dev.rikuty.net',
	'grant_type' => 'authorization_code'
);
 
//URLエンコードされたクエリ文字列を生成
$content = http_build_query($query, '', '&');
 
//ヘッダ設定
$header = array(
	'Authorization: OAuth ya29.GlslB38_yAcf3SFDbIgOZesXXquwNvUmndyGqd49lOchgOvO2mul4CB5vJBNzsTPC9OhQ7bTyoPp2AHc6UQD_XIYwep6CEOlPRgmgXWM8f5Pr-0TAoaSoCBT3-G_', //form送信の際、クライアントがWebサーバーに送信するコンテンツタイプ
);
 
//ストリームコンテキスト設定
$context = array(
	'http' => array(
		'ignore_errors' => true, //ステータスコードが失敗を意味する場合でもコンテンツを取得
		'method' => 'GET', //メソッド。デフォルトはGET
		'header' => implode("\r\n", $header), //ヘッダ設定
		//'content' => $content //送信したいデータ
	)
);
$url = 'https://www.google.com/cloudprint/search';
$res = file_get_contents($url, false, stream_context_create($context));

echo('<pre>');
var_dump($res);
echo('</pre>');

?>