<?php

if(!array_key_exists("user_id", $_GET)){
        exit('user_idを指定してください');
}
$user_id = $_GET["user_id"];

$image_path = '/var/www/user_result/'.$user_id.'/ResultSheet.png';

if (file_exists($image_path)) {
    $fp   = fopen($image_path,'rb');
    $size = filesize($image_path);
    $img  = fread($fp, $size);
    fclose($fp);

    header('Content-Type: image/png');
    echo $img;
}


?>