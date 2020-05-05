<?php
session_start();
require_once("function/token.php");
require_once("function/alert.php");
require_once("function/redirect.php");
require_once("function/user.php");
require_once("function/email.php");

$email = $_SESSION['email'];
//$amount = $_SESSION['BillType'];  

$subject = "Payment Recieved";
$message = "We have recieved your payment";
$headers = "From: no-reply@sngh.org" . "\r\n" . "cc: kufre@sngh.org";

$try = mail($email, $subject, $message, $headers);

set_alert("message", "We have recieved your payment");
redirect_to("pay.php");

?>