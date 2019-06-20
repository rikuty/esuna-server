<?php
require '/var/www/html/common/conf.php';

if(!array_key_exists("facility_id", $_GET)){
        exit('facility_idを指定してください');
}
$facility_id = $_GET["facility_id"];

/*********************************************************************************************************************/
/********************************************* リフレッシュトークン更新 *************************************************/
/*********************************************************************************************************************/
$url = 'https://www.googleapis.com/oauth2/v4/token';
$refresh_data = [];

$sql = "SELECT * FROM u_facility WHERE facility_id = ".$facility_id.' LIMIT 1';
$stmt = $pdo->query($sql);

$resData = $stmt -> fetch(PDO::FETCH_ASSOC);

// $data
$refresh_data['refresh_token'] = $resData['refresh_token'];
$refresh_data['client_id'] = $resData['client_id'];
$refresh_data['client_secret'] = $resData['client_secret'];
$refresh_data['grant_type'] = 'refresh_token';

// curlを初期化
$ch = curl_init();

// 設定
curl_setopt($ch, CURLOPT_URL, $url); // 送り先
curl_setopt($ch, CURLOPT_POST, true); // POSTです
curl_setopt($ch, CURLOPT_POSTFIELDS, $refresh_data); // 送信データ
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // 実行結果取得の設定

// 実行
$res = curl_exec($ch);
$token_obj = json_decode($res);

echo "access_token : ".$token_obj->access_token."<br>";

// アクセストークン、リフレッシュトークンを保管
$access_token = $token_obj->access_token;

//file_put_contents("access_token.txt", $access_token);

// リソースを閉じる
curl_close($ch);

$ch = null;
$res = null;
$token_obj = null;

/*********************************************************************************************************************/
/************************************************ プリンターID取得 *****************************************************/
/*********************************************************************************************************************/

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
$print_obj = json_decode($res);

//var_dump($print_obj);

$printerId = "";

if($print_obj->printers[0]->id == "__google__docs"){
        $printerId = $print_obj->printers[1]->id;
} else {
        $printerId = $print_obj->printers[0]->id;
}

echo "printer_id : ".$printerId."<br>";

/*****************************************************************************************************************/
/************************************************ プリント出力 *****************************************************/
/*****************************************************************************************************************/

//$img = file_get_contents('/var/www/html/ResultSheet.pdf');
//$img = file_get_contents('/var/www/html/ResultSheet.png');

// $image_path = '/var/www/html/ResultSheet.png';
// $img;

// if (file_exists($image_path)) {
//     $fp   = fopen($image_path,'rb');
//     $size = filesize($image_path);
//     $img  = fread($fp, $size);
//     fclose($fp);
// }


//POSTで送りたいデータ
$query = array(
        'printerid' => $printerId,
        'title' => 'sample05',
        //'contentType' => 'application/pdf',
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
        //'Content-Type: application/x-www-form-urlencoded', //form送信の際、クライアントがWebサーバーに送信するコンテンツタイプ
        //'Content-Type: application/pdf', // このリクエストにはプリンタ ID が必要です。
        'Authorization: OAuth '.$access_token
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
$exec_obj = json_decode($res);

echo "<br>";
echo "success : ".$exec_obj->success;
echo "<br>";
echo "message : ".$exec_obj->message;

?>
