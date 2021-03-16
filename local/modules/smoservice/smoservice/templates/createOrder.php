<?php
    require(
        $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"
);
    $APPLICATION->SetTitle("createOrder");
    ?>
    <div class="row d-flex mt-3">
        <div class="col-3" >
            <div>
                <a class="nav-link" aria-current="page" href="/local/modules/smoservice/smoservice/templates/index.php">Проверить баланс или статус</a>
            </div>
            <div>
                <a class="nav-link" aria-current="page" href="/local/modules/smoservice/templates/createOrder.php">Создать заказ</a>
            </div>
            <div>
                <a class="nav-link" href="/local/modules/smoservice/templates/checkOrder.php">Проверить заказ</a>
            </div>
        </div>
        <div class="col-9 ml-5">
            <h3>Проверка Баланса или каталог сервисов</h3>

            <form action="/local/modules/smoservice/smoservice/templates/result.php" method="post" >
                <div class="mb-3 col-6">
                    <label for="exampleFormControlInput1" class="form-label ">Введите user_id</label>
                    <input class="form-control" name="user_id" placeholder="user_id">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Введите api_key</label>
                    <input class="form-control" name="api_key" placeholder="api_key">
                </div>
                <input type="hidden" name="action" value="create_order">
                <div class="mb-3 col-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Введите Order_id</label>
                    <input class="form-control" name="order_id" placeholder="Номер id">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Введите service_id</label>
                    <input class="form-control" name="service_id" placeholder="service_id">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Введите количество</label>
                    <input class="form-control" name="count" placeholder="Количество">
                </div>
                <div class="mb-3 col-6">
                    <label for="exampleFormControlTextarea1" class="form-label">Введите url</label>
                    <input class="form-control" name="url" placeholder="Ссылка на продукт">
                </div>
                <div class="mb-3 col-6">
                    <button class="btn btn-primary">Отправить</button>
                </div>
            </form> 
        </div>
    </div>
</div>