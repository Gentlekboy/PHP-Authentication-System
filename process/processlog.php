<?php
    session_start();

  $errorcount = 0;
  $email = $_POST["email"] != ""? $_POST["email"] : $errorcount++;
  $password = $_POST["password"] != ""? $_POST["password"] : $errorcount++;

  $_SESSION["email"] = $email;

  if($errorcount > 0){
    $session_error = "You have " . $errorcount . " error";
    if ($errorcount > 1) {
      $session_error .= "s";
    }
    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;


    header("Location: ../login.php");
  }else{
    $allusers = scandir("../db/users");
    $countallusers = count($allusers);

    for ($counter=0; $counter < $countallusers; $counter++) { 
      $currentuser = $allusers[$counter];

      if ($currentuser == $email . ".json") {
        $userstring = file_get_contents("../db/users/" . $currentuser);
        $userobject = json_decode($userstring);
        $passwordfromdb = $userobject->password;

        $passwordfromuser = password_verify($password, $passwordfromdb);

        if($passwordfromdb == $passwordfromuser){
          $_SESSION["loggedin"] = $userobject->id;
          $_SESSION["fullname"] = $userobject->firstname . " " . $userobject->lastname;
          $_SESSION["role"] = $userobject->designation;
    //For different dashboards
          if ($userobject->designation == "patient") {
            header("Location: ../patient.php");
          }else {
            header("Location: ../personnel.php");
          }
    /*
          header("Location: ../dashboard.php"); */
          die();
        }
      }
    }    
    $_SESSION["error"] = "Invalid email or password";
    header("Location: ../login.php");
    die();
    
  }

?>