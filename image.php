<?php

$image_path = '/var/www/user_result/1/ResultSheet.png';

if (file_exists($image_path)) {
    $fp   = fopen($image_path,'rb');
    $size = filesize($image_path);
    $img  = fread($fp, $size);
    fclose($fp);

    header('Content-Type: image/jpeg');
    echo $img;
}


?>