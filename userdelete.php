<?php

include('MyMethods.php');

$useremail= $_GET['useremail'];

$response =  deleteuseremail($useremail);

if($response == 1)
{
   header('location:adminpanelindex.php');
   //echo "delete success";
}
else
{
    echo "delete not success";
}
?>