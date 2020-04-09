<?php
  session_start();

  $errorcount = 0;

  $email = $_POST["email"] != ""? $_POST["email"] : $errorcount++;

  $_SESSION["email"] = $email;

  if($errorcount > 0){
    $session_error = "You have " . $errorcount . " error";
    if ($errorcount > 1) {
      $session_error .= "s";
    }
    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;

    header("Location: ../forgot.php");
  }else {
    $allusers = scandir("../db/users");
    $countallusers = count($allusers);

    for ($counter=0; $counter < $countallusers; $counter++) { 
      $currentuser = $allusers[$counter];

      if ($currentuser == $email . ".json") {
        /*$_SESSION["error"] = "Registration unsuccessful. User already exists.";
        header("Location: ../forgot.php");
        die();*/
        echo "Everything looks good.";
        die();
      }

    }

    $_SESSION["error"] = "Email is not registered with us." . $email;
    header("Location: ../forgot.php");

  }
?>