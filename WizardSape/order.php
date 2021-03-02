<?php
require('vendor/autoload.php');

$objCart = new \Eshop\Cart(3);
$cartData = $objCart->getCartData();//что то не
echo '<pre>';
print_r($cartData);
echo '</pre>';

?>

<table>
    <thead>
    <tr>
        <th>Название</th>
        <th>Кол-во</th>
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
    <tbody>
    <? endforeach; ?>
</table>


<form class="form">
    <input type="text" class="name" placeholder="ФИО">
    <input type="text" class = 'address' placeholder="Адрес доставки">
    <input type="radio" checked value="Сдек"> Сдек
    <input type="radio" value="Почта России"> Почта России

    <input type="submit">
</form>

<script>
    let form = document.querySelector('.form')
        form.addEventListener('submit', function (e) {
        e.preventDefault();
        let params = {
            cart_id:<?=$cartData['cart_id']?>,
            name:document.querySelector('.name').value,
            address: document.querySelector('.address').value,
            delivery: document.querySelector('input[type="radio"]:checked').value,

        }
        console.log(params)
        let response = fetch('handle.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json;charset=utf-8'
            },
            body: JSON.stringify(params)
        })
    })




</script>

<style>
form {
    display: flex;
    flex-direction: column;
    width: 250px;
}
input {
    margin-bottom: 20px;
}


</style>