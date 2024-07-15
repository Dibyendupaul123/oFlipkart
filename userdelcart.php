<?php

include('MyMethods.php');

$cartid= $_GET['cartid'];

$response = userdeletecart($cartid);

if($response == 1)
{
    echo "Are you sure to delete";
   
}
else
{
    echo "delete not success";
}
?>