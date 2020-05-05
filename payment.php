<?php

session_start();
require_once("function/token.php");
require_once("function/alert.php");
require_once("function/redirect.php");
require_once("function/user.php");
require_once("function/email.php");

//$customer_email = $_SESSION['email'];

$getPayments = file_get_contents("db/payment/d@yahoo.com.json");
$json = json_decode($getPayments, true); // decode the JSON into an associative array
echo '<pre>' . print_r($json, true) . '</pre>';


?>