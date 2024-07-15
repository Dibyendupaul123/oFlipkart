<?php
    include('MyMethods.php');
    $cartid = $_GET['cartid'];
    $qty = $_GET['qty'];
    if($qty == 1)
    {
        deleteCartByCartId($cartid);
    }
    else{
        $res = decreaseCart($cartid);
    }
    
    header('location: my_cart.php');
?>