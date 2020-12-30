<?php
include ('index.php');
$data = file_get_contents('php://input');
$objS->AddToCart($data);
print_r($objS);

