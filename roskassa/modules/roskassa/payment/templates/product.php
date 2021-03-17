<?php
    require(
        $_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php"
);
    $APPLICATION->SetTitle("Товары");
    ?>
    <div class="row d-flex mt-3">
        <div class="col-3" >
            <div>
                <a class="nav-link" href="/local/modules/roskassa/payment/templates/product.php">Продукт</a>
            </div>
        </div>
        <div class="col-9 ml-5 row">
           <div class="col-5">
            <form action="/local/modules/roskassa/payment/templates/basic_pay.php" method="post">
                <h4>Стандартная оплата</h4>
                    <input type="hidden" name="amount" value="100">
                    <p>Цена: 100</p> 
                    <input type="hidden" name="currency" value="RUB">
                    <p>Валюта: RUB</p>
                    <button type="submit">Отправить</button>
                </form>
           </div>
           <div class="col-6">
                <form action="/local/modules/roskassa/payment/templates/index.php" method="post">
                <h4>МультиОплата</h4>
                    <input type="hidden" name="price" value="100">
                    <p>Цена: 100</p> 
                    <input type="hidden" name="currency" value="RUB">
                    <p>Валюта: RUB</p>
                    <div class="mb-3 col-8">
                        <label for="count" class="form-label ">Введите количество</label>
                        <input class="form-control" name="count" placeholder="Количество">
                    </div>
                    <div class="mb-3 col-8">
                        <label for="email" class="form-label ">Введите email</label>
                        <input class="form-control" name="email" placeholder="email">
                    </div>
                    <p>Платежная система</p>
                    <select class="form-select col-6" name="payment_system">
                        <option selected value="11">ЮMoney</option>
                        <option value="14">QIWI</option>
                        <option value="16">Bitcoin</option>
                        <option value="30">Tinkoff Bank</option>
                    </select>
                    <br>
                    <button type="submit">Отправить</button>
                </form>
            </div>
        </div>
        </div>