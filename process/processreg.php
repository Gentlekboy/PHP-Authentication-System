<?php
    session_start();

  $errorcount = 0;

  $firstname = $_POST["firstname"] != ""? $_POST["firstname"] : $errorcount++;
  $lastname = $_POST["lastname"] != ""? $_POST["lastname"] : $errorcount++;
  $email = $_POST["email"] != ""? $_POST["email"] : $errorcount++;
  $gender = $_POST["gender"] != ""? $_POST["gender"] : $errorcount++;
  $designation = $_POST["designation"] != ""? $_POST["designation"] : $errorcount++;
  $department = $_POST["department"] != ""? $_POST["department"] : $errorcount++;
  $password = $_POST["password"] != ""? $_POST["password"] : $errorcount++;

  $_SESSION['firstname'] = $firstname;
  $_SESSION["lastname"] = $lastname;
  $_SESSION["email"] = $email;
  $_SESSION["gender"] = $gender;
  $_SESSION["designation"] = $designation;
  $_SESSION["department"] = $department;  

  if($errorcount > 0){
    $session_error = "You have " . $errorcount . " error";
    if ($errorcount > 1) {
      $session_error .= "s";
    }
    $session_error .= " in your form submission";
    $_SESSION["error"] = $session_error;

    header("Location: ../register.php");
  }else{

    $allusers = scandir("../db/users");
    $countallusers = count($allusers);
    $newuserid = $countallusers-1;

    $userobject = [
      'id' => $newuserid,
      'firstname' => $firstname,
      'lastname' => $lastname,
      'email' => $email,
      'gender' => $gender,
      'designation' => $designation,
      'department' => $department,
      'password' => password_hash($password, PASSWORD_DEFAULT),
    ];

    for ($counter=0; $counter < $countallusers; $counter++) { 
      $currentuser = $allusers[$counter];

      if ($currentuser == $email . ".json") {
        $_SESSION["error"] = "Registration unsuccessful. User already exists.";
        header("Location: ../register.php");
        die();
      } else {
        file_put_contents("../db/users/" . $email . ".json", json_encode($userobject));
        $_SESSION["message"] = "Registration successful. You can now log in, " . $firstname;
        header("Location: ../login.php");
      }
    }
  }
?>