<?php
session_start();
require_once("function/token.php");
require_once("function/alert.php");
require_once("function/redirect.php");
require_once("function/user.php");
require_once("function/email.php");

$email = $_SESSION['email'];

$subject = "Payment Failed";
$message = "We could not recieve your payment, please try again";
$headers = "From: no-reply@sngh.org" . "\r\n" . "cc: kufre@sngh.org";

$try = mail($email, $subject, $message, $headers);

set_alert("message", "Payment failed");
redirect_to("pay.php");

?>