<?php
    require(
        $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"
    );
    $APPLICATION->SetTitle("result");
?>
<div class="row d-flex mt-3">
        <div class="col-3" >
            <div>
                <a class="nav-link" aria-current="page" href="/local/modules/smoservice/smoservice/templates/index.php">Проверить баланс или статус</a>
            </div>
            <div>
                <a class="nav-link" aria-current="page" href="/local/modules/smoservice/smoservice/templates/createOrder.php">Создать заказ</a>
            </div>
            <div>
                <a class="nav-link" href="/local/modules/smoservice/smoservice/templates/checkOrder.php">Проверить заказ</a>
            </div>
        </div>
        <div class="col-9 ml-5">
<?
    use Bitrix\Smoservice\Utils;
    $action = $_POST['action'];
    if(($action == "balance" || $action == "check_order" || $action == "create_order") && CModule::IncludeModule('smoservice')){
        $req = Utils::getReq($_POST);
        echo "<div class='mt-3'> Тип: $req->type</div>";
        echo "<div>Описание: $req->desc</div>";
        foreach ($req->data as $item){
            echo "<div>Сумма: $item</div>";
        }
    }
    else if($action == "services" && CModule::IncludeModule('smoservice')){
        $req = Bitrix\Smoservice\Utils::getReq($_POST);
        echo "<div class='mt-3'> Тип: $req->type</div>";
        echo "<div>Описание: $req->desc</div>";
        foreach ($req->data as $item){
            foreach($item as $key => $value){
                echo "<div>$key: $value</div>";
            }
                echo "<br>";
        }
    }
    else{
        echo "Неправильно введены данные";
    }
?>