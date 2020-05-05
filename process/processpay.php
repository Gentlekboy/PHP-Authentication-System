<?php
    session_start();

    require_once("../function/token.php");
    require_once("../function/alert.php");
    require_once("../function/redirect.php");
    require_once("../function/user.php");

    $BillType = $_POST['BillType'];
    $NGNCurrency = 'NGN';

    $_SESSION['BillType'] = $BillType;
    $_SESSION['currency'] = $NGNCurrency;

    $curl = curl_init();

    $customer_email = $_SESSION['email'];
    $amount = $_SESSION['BillType'];  
    $currency = $_SESSION['currency'];

    function generateTxtref(){
      $txref = 'txref_rave-';
      for ($i=0; $i < 20; $i++){ 
        $txref .= mt_rand(0, 19);
      }
      return $txref;
    }
    $_SESSION['texref'] = generateTxtref();

    $txref = $_SESSION['texref']; // ensure you generate unique references per transaction.
    $PBFPubKey = "FLWPUBK_TEST-9f69c64466b1aa52e4d240fd05cf61d6-X"; // get your public key from the dashboard.
    $redirect_url = "http://localhost/SNGH/testing.php";
    


    curl_setopt_array($curl, array(
      CURLOPT_URL => "https://api.ravepay.co/flwv3-pug/getpaidx/api/v2/hosted/pay",
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_CUSTOMREQUEST => "POST",
      CURLOPT_POSTFIELDS => json_encode([
        'amount'=>$amount,
        'customer_email'=>$customer_email,
        'currency'=>$currency,
        'txref'=>$txref,
        'PBFPubKey'=>$PBFPubKey,
        'redirect_url'=>$redirect_url,
      ]),
      CURLOPT_HTTPHEADER => [
        "content-type: application/json",
        "cache-control: no-cache"
      ],
    ));
    
    $response = curl_exec($curl);
    $err = curl_error($curl);
    
    if($err){
      // there was an error contacting the rave API
      die('Curl returned error: ' . $err);
    }
    
    $transaction = json_decode($response);
    
    if(!$transaction->data && !$transaction->data->link){
      // there was an error from the API
      print_r('API returned error: ' . $transaction->message);
    }  
    
    // redirect to page so User can pay
    // uncomment this line to allow the user redirect to the payment page
    header('Location: ' . $transaction->data->link);
  
?>