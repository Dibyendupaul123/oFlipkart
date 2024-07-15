<?php

include('MyMethods.php');

$adminemail= $_GET['adminemail'];

$response =  deleteadminemail($adminemail);

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