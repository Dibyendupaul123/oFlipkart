<?php
    session_start();
    unset($_SESSION['adminemail']);

    header('location:index.php');
?>