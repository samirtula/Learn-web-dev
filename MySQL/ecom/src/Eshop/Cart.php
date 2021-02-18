<?php


namespace Eshop;


class Cart
{
    protected $cartTable = 'cart';
    protected $cartProductTable = 'in_cart';
    protected $orders = 'orders';
    protected $db = null;
    protected $userId = false;
    protected $cartId = false;

    public function __construct($userId)
    {
        $this->userId = $userId;
        $this->db = new Db();
    }

    public function getUserCart()
    {
        $query = "SELECT * FROM {$this->cartTable} WHERE `user_id` = {$this->userId} ORDER BY id DESC LIMIT 1";
        $result = $this->db->query($query);
        $return = $result->fetch_all(MYSQLI_ASSOC);
        return current($return);
    }

    public function createCart()
    {
        $query = "INSERT INTO {$this->cartTable} (`user_id`) VALUES ('{$this->userId}')";
        $exec = $this->db->query($query);

        if ($exec) {
            $lastInsertId = $this->db->getDb()->insert_id;
            return $lastInsertId;
        } else {
            throw new \Exception('Не удалось создать корзину!');
        }
    }

    public function addProductToCart($productId, $quantity)
    {
        $query = "INSERT INTO {$this->cartProductTable} (`product_id`, `quantity`, `cart_id`) VALUES ('{$productId}', '{$quantity}', '{$this->cartId}')";
        $result = $this->db->query($query);
        return $result;
    }

    public function add($productId, $quantity)
    {
        try {
            $checkUserCart = $this->getUserCart();

            if ($checkUserCart === false) {
                $this->cartId = $this->createCart();
            }
            else {
                $this->cartId = $checkUserCart['id'];
            }

            $this->addProductToCart($productId, $quantity);

        } catch (\Exception $e) {

        }
    }

    public function getCartData()
    {
        $userCart = $this->getUserCart();
        $userCartId = $userCart['id'];

        $query = "SELECT *, in_cart.id as rid FROM {$this->cartProductTable}
        INNER JOIN products ON products.id = in_cart.product_id
        INNER JOIN cart ON cart.id = in_cart.cart_id
        WHERE in_cart.cart_id = {$userCartId} AND in_cart.status = 0";//добавляем таблицу cart для доступа к userid выводим только статусы = 0

        $exec = $this->db->query($query);
        $cartProducts = $exec->fetch_all(MYSQLI_ASSOC);
        $result = [
            'products' => $cartProducts,
            'total_price' => 0,
            'cart_id' => $userCartId,
            'userId' => $this->userId//userid чтобы в handle.php не передавать все время id user при создании объекта Cart
        ];

        foreach ($cartProducts as $item) {
            $result['total_price'] += $item['price'] * $item['quantity'];
        }

        return $result;
    }

    public function deleteCartProduct($productId)
    {
        $query = "DELETE FROM {$this->cartProductTable} WHERE id = {$productId}";

        return $this->db->query($query);
    }
    public function changeQuantity($productId, $newQuantity)
    {
        $query = "UPDATE {$this->cartProductTable} SET quantity = $newQuantity WHERE id = {$productId}";
        return $this->db->query($query);
    }
    public  function addQuantity($productId, $newQuantity)
    {
        $query = "UPDATE {$this->carProductable} SET quantity = $newQuantity WHERE id = {$productId}";
        return $this->db->query($query);
    }

    public function makeOrder ($clientName, $address, $phone, $email, $statusId, $deliveryTypeId, $paymentType, $cart_id)//добавление заказа в таблицу заказов orders
    {
        $query = "INSERT INTO {$this->orders} (clientName, address, phone, email, statusId, deliveryTypeId,paymentTypeId, cart_id) VALUES ('$clientName','$address','$phone','$email','$statusId','$deliveryTypeId','$paymentType','$cart_id')";
        return $this->db->query($query);
    }

    public function setCartStatus($cart_id)//изменение статусов заказов в in_cart
    {
        $query = "UPDATE $this->cartProductTable SET status = 1 WHERE cart_id = $cart_id AND status = 0";
        echo $query;
        return $this->db->query($query);
    }
/*    public function getAllOrders()
    {
        $query = "SELECT $this->orders.address, $this->orders.phone, $this->orders.email, $this->orders.statusId, $this->orders.clientName, $this->orders.deliveryTypeId, $this->orders.paymentTypeId, $this->orders.cart_id, delivery_types.deliveryType, payment_types.paymentType, status_types.status FROM $this->orders INNER JOIN payment_types ON payment_types.id = $this->orders.paymentTypeId INNER JOIN delivery_types ON delivery_types.id = $this->orders.deliveryTypeId INNER JOIN status_types ON status_types.id = $this->orders.statusId ORDER BY $this->orders.id ASC";
        $data =  $this->db->query($query);
        $dataAssocArr = $data->fetch_all(MYSQLI_ASSOC);
       return $dataAssocArr;
    }*/

}