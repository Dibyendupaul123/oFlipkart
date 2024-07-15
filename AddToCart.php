<?php

    include('MyMethods.php');

    $id = $_GET['id'];

    //echo "hII: ".$id;

    

    session_start();

    $email = "";

    if(isset($_SESSION['useremail']))
    {
        $email = $_SESSION['useremail'];
    }
    else{
        header('location: userlogin.php');
    }

    $response = addToCart($id, $email);

    if($response == 1)
    {
        echo "Product added into cart";
    }
    else{
        echo "Product Not added";
    }

    
?>