<?php
if(!$_POST){
    die('403');
}
    $secret   = 'OF7leaOH';
    $data = $_POST;
    $id = $_POST['order_id'];
    unset($data["sign"]);
    ksort($data);
    $str = http_build_query($data);
    $sign = md5($str . $secret);
    
    $connection = Bitrix\Main\Application::getConnection();
    $connection->queryExecute("SELECT * FROM payment WHERE `ORDER_ID` = $id");

    $connection->queryExecute("UPDATE payment SET `PAYMENT_DONE` = true WHERE `ORDER_ID`=$id");