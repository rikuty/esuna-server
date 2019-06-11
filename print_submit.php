<?php

$acces_token = "ya29.GlslB1xfFPHGpu1o_6xlXkvqLaKqgrxLE3vwMHdGwUaJpcjOM2q19KFuK_nWH-bXnEDy5gD_O8oz3GsmV9Kg2d7nJL2nqGuJT3dYTA64PNojYqUzwSOksGsyUyVF";
//$img = file_get_contents('/var/www/user_result/1/ResultSheet.png');

// $image_path = '/var/www/user_result/1/ResultSheet.png';
// $img;

// if (file_exists($image_path)) {
//     $fp   = fopen($image_path,'rb');
//     $size = filesize($image_path);
//     $img  = fread($fp, $size);
//     fclose($fp);
// }

//POSTで送りたいデータ
$query = array(
	'printerid' => 'cb69ed03-b40b-7f6c-1c21-aef97985cfd6', 
	'title' => 'sample01', 
	//'contentType' => 'image/png',
	//'content' => $img,
	'contentType' => 'url',
	'content' => 'https://dev.rikuty.net/image.php',
	'ticket' => '{"version":"1.0","print":{"vendor_ticket_item":[],"color":{"type":"STANDARD_COLOR"},"copies":{"copies":1}}}'
);
 
//URLエンコードされたクエリ文字列を生成
$content = http_build_query($query, '', '&');


//ヘッダ設定
$header = array(
	'Content-Type: application/x-www-form-urlencoded', //form送信の際、クライアントがWebサーバーに送信するコンテンツタイプ
	//'Content-Type: image/png',
	'Authorization: OAuth '.$acces_token
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