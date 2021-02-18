<?php
require('vendor/autoload.php');

$objCart = new \Eshop\Cart(3);
$cartData = $objCart->getCartData();//что то не
/*echo '<pre>';
print_r($cartData);
echo '</pre>';*/

?>
<h2 class="order-header">Товары в вашей корзине</h2>
<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Количество</th>
        <th>Цена</th>
    </tr>
    </thead>
    <tbody>
    <? foreach ($cartData['products'] as $item): ?>
    <tr data-recordId="<?= $item['rid'] ?>">
        <td><?= $item['name'] ?></td>
        <td>
            <span class="quantity"><?= $item['quantity'] ?></span>
        </td>
        <td><?= $item['price'] ?></td>
    <tr>
        <? endforeach; ?>
    <tbody>
</table>

<div class="commonSum">
    Итоговая цена: <span class="total-data"><?= $cartData['total_price'] ?></span>
</div>

<form class="order-form" id="order-form-delivery">
    <h4 class="order-info">Оформление заказа</h4>
    <h2 class="order-title">Адрес доставки</h2>
    <div class="order-form__delivery-address delivery-address">
        <input class="delivery-address__input delivery-address__input--name" type="text" placeholder="Имя">
        <input class="delivery-address__input delivery-address__input--surname" type="text" placeholder="Фамилия">
        <input class="delivery-address__input delivery-address__input--phone" type="tel" placeholder="Телефон">
        <input class="delivery-address__input delivery-address__input--email" type="email" placeholder="Email">
        <input class="delivery-address__input delivery-address__input--city" type="text"
               placeholder="Город">
        <input class="delivery-address__input delivery-address__input--index" type="text"
               placeholder="Индекс">
        <input class="delivery-address__input delivery-address__input--address" type="text"
               placeholder="Адрес доставки">
    </div>
    <h2 class="order-title">Способ доставки</h2><span class="order-form__delivery-type-info">Цена и сроки доставки зависят от региона.</span>
    <div class="order-form__delivery-type delivery-type">
        <label class="delivery-type__name radio-other">
            <input class="delivery-type__choice" type="radio" value="1" id="delivery-one"><span
                    class="radio-other__text">Курьерская служба СДЭК <br> <span class="radio-other__text-grey">Бесплатная доставка при заказе от 5000 ₽</span></span>
        </label>
        <label class="delivery-type__name radio-other">
            <input class="delivery-type__choice" type="radio" value="2" id="delivery-two" checked><span
                    class="radio-other__text">Почта России <br> <span class="radio-other__text-grey">Бесплатная доставка при заказе от 5000 ₽</span></span>
        </label>
    </div>
    <h2 class="order-title">Способ оплаты</h2><span class="order-form__payment-type-info">Бесплатная доставка при заказе от 5000 ₽</span>
    <div class="order-form__payment-type payment-type">
        <label class="payment-type__name radio-other">
            <input class="payment-type__choice" type="radio" value="1" id="payment-choice-one" checked><span
                    class="radio-other__text">Наложенный платеж</span>
        </label>
        <label class="payment-type__name radio-other">
            <input class="payment-type__choice" type="radio" value="2" id="payment-choice-two"><span
                    class="radio-other__text">Перевод на сбербанк</span>
        </label>
    </div>
    <input class="form__button" type="submit" value="офромить">
</form>

<div class="popup">
    <h2 class="order-header">Ваш заказ оформлен</h2>
</div>

<script>
    //переключатели radio
    const deliveryOne = document.querySelector('#delivery-one');
    const deliveryTwo = document.querySelector('#delivery-two');


    deliveryOne.addEventListener('click', function () {
        deliveryTwo.checked = false;
    });

    deliveryTwo.addEventListener('click', function () {
        deliveryOne.checked = false;
    });


    const paymentOne = document.querySelector("#payment-choice-one");
    const paymentTwo = document.querySelector("#payment-choice-two");

    paymentOne.addEventListener('click', function () {
        paymentTwo.checked = false;
    });
    paymentTwo.addEventListener('click', function () {
        paymentOne.checked = false;
    });
    // Основной ajax на оформление заказа
    let form = document.querySelector('.order-form');
    form.addEventListener('submit', function (e) {
        e.preventDefault();
        let values = document.querySelectorAll('.delivery-address__input');
       for (let i = 0; i < values.length; i++) {//проверка на пустоту
           if (values[i].value == '') {
               console.log(values[i]);
               alert('Заполнены не все поля формы');
               throw new Error('Пусты поля в форме');
           }
       }
        if (document.querySelector('.total-data').innerHTML <= 0) {//проверка корзины на пустоту
            alert('Корзина пуста');
            throw new Error('Корзина пуста');
        }
        let params = {
            method: 'makeOrder',
            cart_id:<?=$cartData['cart_id']?>,
            user_id:<?=$cartData['userId']?>,
            name: document.querySelector('.delivery-address__input--name').value + ' ' +  document.querySelector('.delivery-address__input--surname').value ,
            phone: document.querySelector('.delivery-address__input--phone').value,
            email: document.querySelector('.delivery-address__input--email').value,
            address: document.querySelector('.delivery-address__input--address').value + ' ' + document.querySelector('.delivery-address__input--city').value + ' ' + document.querySelector('.delivery-address__input--index').value,
            deliveryType: document.querySelector('input.delivery-type__choice[type="radio"]:checked').value,
            paymentType:document.querySelector('input.payment-type__choice[type="radio"]:checked').value,
            statusId: 1,
            // статус 1 - 'оформленная заявка'
        };
        let response = fetch('handle.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(params)
            //ответ-ок. запускаем второй ajax на изменение статусов в in_cart
        }).then(function (response) {
            let popup = document.querySelector('.popup');
            if(response.ok) {
                popup.style.display = 'flex';
                let params = {
                    method: 'setStatus',
                    cart_id:<?=$cartData['cart_id']?>,
                    user_id:<?=$cartData['userId']?>,
                    status: 1,
                };
                let response = fetch('handle.php', {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json;charset=utf-8'
                  },
                    body: JSON.stringify(params)
                })
            }
        });
    });

</script>


<style>
    .commonSum {
        font-size: 18px;
        margin-left: 30px;
        margin-top: 30px;
    }
    .order-header {
        width: 574px;
        text-align: center;
        font-size: 30px;
        margin-left: 30px;
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
    }
    th {
        background-color: #fff;
    }
    form {
        display: flex;
        flex-direction: column;
        max-width: 574px;
        margin-left: 30px;
    }

    input {
        margin-bottom: 20px;
    }

    .order-info {
        align-self: center;
        font-size: 16px;
        padding-top: 47px;
        display: block;
    }


    .order-title {
        margin-top: 38px;
        font-size: 30px;
        padding-bottom: 30px;
        align-self: center;
    }

    .delivery-address {
        display: flex;
        flex-direction: column;
    }

    .delivery-address__input {
        height: 40px;
        border: 1px solid rgba(49, 49, 49, 0.8);
        box-sizing: border-box;
        margin-bottom: 20px;
        padding-left: 10px;
        background: #FCF1F1;
    }

    .delivery-type__name {
        padding: 18px 0px;
        line-height: 150%;
        border-bottom: 2px solid #ffb0b0;
    }

    .order-form__delivery-type-info {
        padding-bottom: 46px;
        letter-spacing: 0.05em;
        color: rgba(49, 49, 49, 0.8);
        border-bottom: 2px solid #ffb0b0;
    }

    .radio-other {
        display: block;
        cursor: pointer;
        position: relative;
        width: 100%;
    }

    .checkbox-other input[type=checkbox], .radio-other input[type=radio] {
        position: absolute;
        z-index: -1;
        opacity: 0;
        display: block;
        width: 0;
        height: 0;
    }

    .radio-other input[type=radio]:checked + .radio-other__text:before {
        background-image: url(images/cheked-radio.svg);
        background-position: center;
        background-repeat: no-repeat;
    }

    .radio-other .radio-other__text {
        display: inline-block;
        position: relative;
        padding: 0 0 0 25px;
        color: #313131;
        font-size: 16px;
        letter-spacing: 0.05em;
    }

    .radio-other .radio-other__text:before {
        content: "";
        display: inline-block;
        width: 15px;
        height: 15px;
        position: absolute;
        left: 0;
        top: 3px;
        border: 1px solid #313131;
        border-radius: 50%;
    }

    span.radio-other__text-grey {
        font-weight: 500;
        font-size: 14px;
        line-height: 70%;
        letter-spacing: 0.05em;
    }

    .order-form__payment-type-info {
        max-width: 100%;
        width: 100%;
        text-align: center;
        padding-bottom: 50px;
        color: rgba(49, 49, 49, 0.8);
        border-bottom: 2px solid #ffb0b0;
    }

    .payment-type__name {
        padding: 18px 0px;
        display: block;
        line-height: 150%;
        border-bottom: 2px solid #ffb0b0;
    }

    .form__button {
        height: 60px;
        background: #ffb0b0;
        font-weight: bold;
        border: none;
        margin-top: 30px;
        width: 100%;
        cursor: pointer;
        text-transform: uppercase;
    }
    .popup {
        background-color: #ffb0b0;
        width: 574px;
        height: 200px;
        justify-content: space-around;
        align-items: center;
        position: absolute;
        top: 70%;
        left: 50%;
        margin: -100px 0 0 -287px;
        display: none;
}
</style>