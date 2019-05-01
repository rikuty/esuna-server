<?php
/*
require_once("./conf.php");

$mysqli = new mysqli(SERVER_URL, USER_NAME, USER_PASS, DB_NAME);

if ($mysqli->connect_error) {
    echo $mysqli->connect_error;
    exit();
} else {
    $mysqli->set_charset("utf8");
}

$sql = "SELECT user_id, user_name FROM m_user";
if ($result = $mysqli->query($sql)) {
    // json変換
    echo json_encode($result->fetch_assoc());
    $result->close();
}

$mysqli->close();
*/

/*
require './../vendor/autoload.php';
use  josegonzalez\Dotenv\Loader as Dotenv;
Dotenv::load([
    'filepath' =>  './../.env',
    'toEnv' => true
]);

try {

    // リクエストから得たスーパーグローバル変数をチェックするなどの処理 

    // データベースに接続
    $db_host=$_ENV['DB_HOST'];
    $db_name= $_ENV['DB_NAME'];
    $db_port=$_ENV['DB_PORT'];
    $db_user=$_ENV['DB_USER'];
    $db_pass=$_ENV['DB_PASS'];
    $pdo = new PDO(
        "mysql:dbname={$db_name};host={$db_host};charset=utf8mb4",
        $db_user,
        $db_pass,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );

    // データベースから値を取ってきたり， データを挿入したりする処理 

} catch (PDOException $e) {

    // エラーが発生した場合は「500 Internal Server Error」でテキストとして表示して終了する
    // - もし手抜きしたくない場合は普通にHTMLの表示を継続する
    // - ここではエラー内容を表示しているが， 実際の商用環境ではログファイルに記録して， Webブラウザには出さないほうが望ましい
    header('Content-Type: text/plain; charset=UTF-8', true, 500);
    exit($e->getMessage());

}
*/
require './../common/conf.php';

$stmt = $pdo->query("SELECT user_id, CONCAT(last_name, ' ', first_name) as name FROM u_user");
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    //echo $row["user_id"]." : ".$row["name"]."\n";
    echo json_encode($row);
}

?>