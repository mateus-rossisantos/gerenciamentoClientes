<?php
session_start();

if ($_POST['status'] === '200' && $_SESSION['user'] == true) {
    
    $_SESSION['user_id'] = $_POST['userId'];
    $response = json_encode(array('status' => 'success', 'redirectUrl' => 'reset_password.php'));
    echo $response;
    die();

} else {
    $message = "Error";
    $response = json_encode(array('status' => 'error', 'errorMessage' => $message));
    echo $response;
    die();
}