<?php
require ('vendor/autoload.php');
$request = json_decode(file_get_contents('php://input'), 1);

if (empty($request)) {
    $request = $_REQUEST;

    if (!empty($_FILES) && array_key_exists('file_img', $_FILES)) {
        $request['file'] = $_FILES['file_img'];
    }
}
/*
echo '<pre>';
print_r($request);
echo '</pre>';*/



//var_dump($_FILES);
//var_dump($request);

$obj = new \Eshop\Product();

if ($request['method'] == 'update')
{
    try {
        $obj->updateProduct($request['id'], $request);

    }
    catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
}
elseif ($request['method'] == 'add') {
    $obj->addProduct($request);
}
elseif ($request['method'] == 'delete')
{
    $obj->deleteProduct($request['id']);
}
elseif ($request['method'] == 'getProduct')
{

    $objData = $obj->getProducts(["*"],['id'=>$request['id']]);
    echo json_encode($objData);
}
elseif ($request['method'] == 'deleteCartProduct') {
    $objCart = new \Eshop\Cart(3);
    $resultDeleteProduct = $objCart->deleteCartProduct($request['id']);
    $getCurrentCart = $objCart->getCartData();
    echo json_encode(['result' => $resultDeleteProduct, 'totalPrice' => $getCurrentCart['total_price']]);
}
elseif ($request['method'] == 'changeQuantity') {
    $objCart = new \Eshop\Cart(3);
    $resultDeleteProduct = $objCart->changeQuantity($request['id'], $request['quantity']);
    $getCurrentCart = $objCart->getCartData();
    echo json_encode(['result' => $resultDeleteProduct, 'totalPrice' => $getCurrentCart['total_price'] ]);
}
elseif ($request['method'] == 'addQuantity') {
    $objCart = new \Eshop\Cart(3);
    $resultAddProduct = $objCart->addQuantity($request['id'], $request['quantity']);
    $getCurrentCart = $objCart->getCartData();
    echo json_encode(['result' => $resultAddProduct, 'totalPrice' => $getCurrentCart['total_price'] ]);
}
elseif ($request['method'] == 'makeOrder') {
    $objCart = new \Eshop\Cart($request['user_id']);
    $resultAddOrder = $objCart->makeOrder($request['name'],$request['address'],$request['phone'],$request['email'],$request['statusId'],$request['deliveryType'], $request['paymentType'],$request['cart_id']);
}
elseif ($request['method'] == 'setStatus') {
    $objCart = new \Eshop\Cart($request['user_id']);
    $resultSetStatus = $objCart->setCartStatus($request['cart_id']);
}
/*elseif ($request['method'] == 'getAllFilter') {
    $obj = new \Eshop\Admin('orders');
    $ordersData = $obj->getAllOrdersFilter($request['filter']);
}*/
