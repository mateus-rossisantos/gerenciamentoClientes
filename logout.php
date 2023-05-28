<?php
session_start();

unset($_SESSION['representante_id']);
unset($_SESSION['representante_name']); 
unset($_SESSION['representante_status']); 
unset($_SESSION['representante_email']); 

session_destroy();

header('location:index.php');

?>