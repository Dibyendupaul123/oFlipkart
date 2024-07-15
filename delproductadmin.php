<?php

include('MyMethods.php');

$id= $_GET['id'];

$response = delete($id);

if($response == 1)
{
   header('location:products.php');
   //echo "delete success";
}
else
{
    echo "delete not success";
}
?>