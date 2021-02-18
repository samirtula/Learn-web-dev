<?php
require('vendor/autoload.php');

$objCart = new \Eshop\Cart(3);
$cartData = $objCart->getCartData();//что то не так
//echo "<pre>"; print_r($cartData); echo "</pre>";
?>
<h2 class="order-header">Товары в вашей корзине</h2>

<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Количество</th>
        <th>Цена</th>
        <th>Удалить</th>
        <th>Добавить</th>
    </tr>
    </thead>
    <tbody>

    <? foreach ($cartData['products'] as $item): ?>
        <tr data-recordId="<?= $item['rid'] ?>">
            <td><?= $item['name'] ?></td>
            <td>
                <button class="minus">-</button>
                <span class="quantity"><?= $item['quantity'] ?></span>
                <button class="plus">+</button>
            </td>
            <td><?= $item['price'] ?></td>
            <td>
                <button class="delete-record">Удалить</button>
            </td>
            <td>
                <button class="add-record">Добавить</button>
            </td>
        </tr>
    <? endforeach; ?>
    </tbody>
</table>

<div class="commonSum">
    Итоговая цена: <span class="total-data"><?= $cartData['total_price'] ?></span>
</div>
<button class="form__button">Оформить заказ</button>


<style>
    .order-header {
        width: 574px;
        text-align: center;
        font-size: 30px;
        margin-left: 30px;
    }
    .commonSum {
        font-size: 18px;
        margin-left: 30px;
        margin-top: 30px;
    }
    table {
        width: 574px;
        margin-left: 30px;
        border: 1px solid #000000;
        border-collapse: collapse;

    }
    td,th {
        min-width: 90px;
        height: 40px;
        border: 1px solid #000000;
        border-collapse: collapse;
        background-color: #FCF1F1;
        padding-left: 10px;
        text-align: center;
    }
    th {
        background-color: #fff;

    }
    .form__button {
        height: 60px;
        background: #ffb0b0;
        font-weight: bold;
        border: none;
        margin-top: 30px;
        cursor: pointer;
        text-transform: uppercase;
        width: 574px;
        margin-left: 30px;
    }

</style>

<script>

    let quantities = document.querySelectorAll('.quantity');
    let quantityArr = Array.prototype.slice.call(quantities);


    let prevQuantitiesArr = [];
    quantityArr.forEach(function (e) {
        prevQuantitiesArr.push(e.innerHTML)
    });


    let minus = document.querySelectorAll('.minus');
    let plus = document.querySelectorAll('.plus');

    minus.forEach(function (e) {
        e.addEventListener('click', function () {
            let td = e.closest('td');//запрет отрицательынх чисел в количестве товаров
            if (td.querySelector('.quantity').innerHTML > 0)  td.querySelector('.quantity').innerHTML = Number(td.querySelector('.quantity').innerHTML) - 1
        })
    });

    plus.forEach(function (e) {
        e.addEventListener('click', function () {
            let td = e.closest('td');
            td.querySelector('.quantity').innerHTML = Number(td.querySelector('.quantity').innerHTML) + 1
        })
    });

    let addButtons = document.querySelectorAll('.add-record');
    addButtons.forEach(function (elementButton) {
        elementButton.addEventListener('click', function (e)
        {

            let addButtonsArr = Array.prototype.slice.call(addButtons);
            let change = addButtonsArr.indexOf(e.target);


            let newQuantities = document.querySelectorAll('.quantity');
            let newQuantityArr = Array.prototype.slice.call(newQuantities);


            let previousQuantity = Number(prevQuantitiesArr[change]);
            console.log('pred' + previousQuantity);
            let updateQuantity = Number(newQuantityArr[change].innerHTML);
            console.log('new' + updateQuantity);
            let newQuantity = updateQuantity + previousQuantity;


            console.dir(newQuantity);


            let parentTr = this.closest('tr');
            let recordId = parentTr.dataset.recordid;

            if (updateQuantity > 0) {
                let params = {
                    id: recordId,
                    quantity: newQuantity,
                    method: 'addQuantity'
                };
                let response = fetch('handle.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify(params)
                })
                    .then((response) => {
                        return response.json();
                    })
                    .then((data) => {
                        addButtons = document.querySelectorAll('.add-record');
                        newQuantityArr[change].innerHTML = newQuantity;
                        console.log(data);
                        quantities = document.querySelectorAll('.quantity');
                        quantityArr = Array.prototype.slice.call(quantities);
                        prevQuantitiesArr = [];
                        quantityArr.forEach(function (e) {
                            prevQuantitiesArr.push(e.innerHTML)
                        });
                        let totalData = document.querySelector('.total-data').innerHTML = data.totalPrice;

                    });
            }
        })
    });


    let deleteButtons = document.querySelectorAll('.delete-record');
    deleteButtons.forEach(function (elemButton) {
        elemButton.addEventListener('click', function (e)
        {


            let deleteButtonsArr = Array.prototype.slice.call(deleteButtons);
            let change = deleteButtonsArr.indexOf(e.target);


            let newQuantities = document.querySelectorAll('.quantity');
            let newQuantityArr = Array.prototype.slice.call(newQuantities);


            let previousQuantity = Number(prevQuantitiesArr[change]);
            let updateQuantity = Number(newQuantityArr[change].innerHTML);

            let newQuantity = previousQuantity - updateQuantity;


            console.dir(newQuantity);


            let parentTr = this.closest('tr');
            let recordId = parentTr.dataset.recordid;
            if (newQuantity === 0) {
                let params = {
                    id: recordId,
                    method: 'deleteCartProduct'
                };
                let response = fetch('handle.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify(params)
                })
                    .then((response) => {
                        return response.json();
                    })
                    .then((data) => {
                        console.log(data)
                        parentTr.remove();
                        deleteButtons = document.querySelectorAll('.delete-record');
                        quantities = document.querySelectorAll('.quantity');
                        quantityArr = Array.prototype.slice.call(quantities);
                        prevQuantitiesArr = [];
                        quantityArr.forEach(function (e) {
                            prevQuantitiesArr.push(e.innerHTML)
                        });
                        let totalData = document.querySelector('.total-data').innerHTML = data.totalPrice;
                    });
            }
            else if(newQuantity < 0)//пытаются удалить из корзины больше чем есть
            {
                alert('Проверьте количсетво. Нельзя удалить больше товаров чем добавлено в корзину');
            }
            else {
                let params = {
                    id: recordId,
                    quantity: newQuantity,
                    method: 'changeQuantity'
                };
                let response = fetch('handle.php', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json;charset=utf-8'
                    },
                    body: JSON.stringify(params)
                })
                    .then((response) => {
                        return response.json();
                    })
                    .then((data) => {
                        newQuantityArr[change].innerHTML = newQuantity;
                        console.log(data);
                        quantities = document.querySelectorAll('.quantity');
                        quantityArr = Array.prototype.slice.call(quantities);
                        prevQuantitiesArr = [];
                        quantityArr.forEach(function (e) {
                            prevQuantitiesArr.push(e.innerHTML)
                        });
                        let totalData = document.querySelector('.total-data').innerHTML = data.totalPrice;
                    });
            }
        });
    });

    //слушатель кнопки оформления заказа с переходом на order.php с запретом на нулевое значение в итоговой сумме
    document.querySelector('.form__button').addEventListener('click', function () {
    if (document.querySelector('.total-data').innerHTML > 0) {
        window.location.replace("order.php");
    }
    else
    {
        alert('Ваша корзина пуста')
    }
});

</script>
