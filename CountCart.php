<?php
    session_start();
    include('MyMethods.php');
    $count = countcart();
    echo '('. $count .')';
?>