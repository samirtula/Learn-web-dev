<?php
require('vendor/autoload.php');


$request = json_decode(file_get_contents('php://input'), 1);


$ordersData = '';


if ($request['method'] == 'getAllFilter') {
    $obj = new \Eshop\Admin('orders');
    $ordersData = $obj->getAllOrdersFilter($request['filter']);
} else {
    $obj = new \Eshop\Admin('orders');
    $ordersData = $obj->getAllOrders();
}

?>
<div class="old">
    <h2 class="order-header"> Общие данные по заказам</h2>
    <select>
        <option>1</option>
    </select>
    <select>
        <option>2</option>
        <option>3</option>
    </select>
    <button>filder</button>
    <table>
        <thead>
        <tr>
            <th class="select" data-record="cart_id">ID корзины</th>
            <th class="select" data-record="status">Статус заказа</th>
            <th class="select" data-record="clientName">Заказчик</th>
            <th class="select" data-record="address">Адрес</th>
            <th class="select" data-record="phone">Телефон</th>
            <th class="select" data-record="email">Email</th>
            <th class="select" data-record="paymentType">Тип оплаты</th>
            <th class="select" data-record="deliveryType">Тип доставки</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($ordersData as $item): ?>
            <tr>
                <td><?= $item['cart_id'] ?></td>
                <td><?= $item['status'] ?></td>
                <td><?= $item['clientName'] ?></td>
                <td><?= $item['address'] ?></td>
                <td><?= $item['phone'] ?></td>
                <td><?= $item['email'] ?></td>
                <td><?= $item['paymentType'] ?></td>
                <td><?= $item['deliveryType'] ?></td>
            </tr>
        <? endforeach; ?>
        </tbody>
    </table>
</div>
<script>

   function initListener()
   {
       let tableHeaders = document.querySelectorAll('.select');

       tableHeaders.forEach(function (element) {
           element.addEventListener('click', function (e) {
               let filter = element.dataset.record;
               console.log(filter)
               let params = {
                   method: 'getAllFilter',
                   filter: filter
               }
               let response = fetch('adminOrders.php', {
                   method: 'POST',
                   headers: {
                       'Content-Type': 'application/json;charset=utf-8'
                   },
                   body: JSON.stringify(params)
               }).then(response => response.text().
               then(function (data) {
                   respData = data;
                   document.querySelector('.old').innerHTML = respData;
                   console.log('sdad')
                   initListener();
               }))
           });
       })
   }
   initListener();

</script>

<style>
    .order-header {
        width: 574px;
        text-align: center;
        font-size: 30px;
        margin-left: 90px;
    }

    table {
        width: 800px;
        margin-left: 30px;
        border: 1px solid #000000;
        border-collapse: collapse;

    }

    td, th {
        height: 40px;
        border: 1px solid #000000;
        border-collapse: collapse;
        background-color: #FCF1F1;
        padding: 10px;
    }

    th {
        background-color: #fff;
    }

    .new {
        display: none;
    }


</style>