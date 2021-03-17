<?php
    require(
        $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"
);
    $APPLICATION->SetTitle("Проверка баланса или статуса");
    $shop_id = "9CFF252E3074FC9682187D5165A6DF33";
    $secret_key = "X6Nvo8RL";
    ?>
    <div class="row d-flex mt-3">
        <div class="col-3" >
            <div>
                <a class="nav-link" href="/local/modules/roskassa/payment/templates/product.php">Продукт</a>
            </div>
        </div>
        <?php
            $APPLICATION->SetTitle("Базовая оплата");
            if(!$_POST)
            {die('Неправильно переданы данные');}
            $shop_id         =  "9CFF252E3074FC9682187D5165A6DF33";
            $secret          =  'OF7leaOH';
            $order_id        =   time();
            $email           =   $_POST["email"];
            $currency        =   $_POST["currency"];
            $price           =   $_POST["price"];
            $count           =   $_POST["count"];
            $payment_system  =   $_POST["payment_system"];
            $amount          =   $price*$count;

            $data = array(
                'shop_id'=>'9CFF252E3074FC9682187D5165A6DF33',
                'amount'=>$amount,
                'currency'=>$currency,
                'order_id'=>$order_id,
            );
            ksort($data);
            $str = http_build_query($data);
            $sign = md5($str . $secret);
            
            $connection = Bitrix\Main\Application::getConnection();
            
            $sql = "INSERT INTO payment (
                `ORDER_ID`,`SHOP_ID`,`EMAIL`,`COUNT`,`AMOUNT`,`CURRENCY`,`SIGN1`) 
                    VALUES  (
                        '$order_id','$email','$count','$shop_id','$amount','$currency','$sign'
                    )";
            $connection->queryExecute($sql);
        ?>
        <div class="col-9 ml-5">
            <h3>МультиОплата</h3>
            <a href=""></a>
            <form action="https://pay.roskassa.net/form/" method="post" >
                <input type="hidden" name="shop_id" value="<?=$shop_id?>">
                <input type="hidden" name="order_id" value="<?=$order_id?>">
                <input type="hidden" name="order_id" value="<?=$order_id?>">
                <input type="hidden" name="amount" value="<?=$amount?>">
                <input type="hidden" name="fields[email]" value="<?=$email?>">
                <input type="hidden" name="order_id" value="<?=$order_id?>">
                <input type="hidden" name="currency" value="<?=$_POST['currency']?>">
                <input type="hidden" name="payment_system" value="<?=$payment_system?>">
                <input type="hidden" name="sign" value="<?=$sign?>">
                <input type="submit" value="Оплатить">
            </form>
        </div>
    </div>
</div>