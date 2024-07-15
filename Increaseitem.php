<?php
    include('MyMethods.php');
    $cartid = $_GET['cartid'];

    $res = increaseCart($cartid);

    header('location: my_cart.php');
?>