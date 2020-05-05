<?php
session_start();
require_once("function/token.php");
require_once("function/alert.php");
require_once("function/redirect.php");
require_once("function/user.php");
require_once("function/email.php");

    if (isset($_GET['txref'])) {
        $ref = $_GET['txref'];
        $amount = $_SESSION['BillType']; //Correct Amount from Server
        $currency = $_SESSION['currency']; //Correct Currency from Server
        $customer_email = $_SESSION['email'];
				$txref = $_SESSION['texref'];

        $query = array(
          "SECKEY" => "FLWSECK_TEST-c654a2e31a18c3d32779c1fce513fc06-X",
          "txref" => $ref
        );

        $data_string = json_encode($query);
                
        $ch = curl_init('https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/verify');                                                                      
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

        $response = curl_exec($ch);

        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($response, 0, $header_size);
        $body = substr($response, $header_size);

        curl_close($ch);

        $resp = json_decode($response, true);

        $paymentStatus = $resp['data']['status'];
        $chargeResponsecode = $resp['data']['chargecode'];
        $chargeAmount = $resp['data']['amount'];
        $chargeCurrency = $resp['data']['currency'];

        if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($chargeAmount == $amount)  && ($chargeCurrency == $currency)) {

					$reciept = [
						'currency'=>$currency,
						'amount'=>$amount,
						'customer_email'=>$customer_email,
						'txref'=>$txref
						];
		
					file_put_contents("db/payment/" . $customer_email . ".json", json_encode($reciept));

					set_alert("message", "We have recieved your payment");
          header('Location: pay.php');
            // transaction was successful...
             // please check other things like whether you already gave value for this ref
          // if the email matches the customer who owns the product etc
          //Give Value and return to Success page
        } else {
					set_alert("message", "Payment failed");
          header('Location: pay.php');
          //Dont Give Value and return to Failure page
        }
    }
        else {
      die('No reference supplied');
    }


?>