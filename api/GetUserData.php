<?php

require './../common/conf.php';

$stmt = $pdo->query("SELECT user_id, CONCAT(last_name, ' ', first_name) as name FROM u_user");
while($row = $stmt -> fetch(PDO::FETCH_ASSOC)) {
    //echo $row["user_id"]." : ".$row["name"]."\n";
    echo json_encode($row, JSON_UNESCAPED_UNICODE);
}

?>