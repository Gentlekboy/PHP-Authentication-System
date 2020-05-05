<?php

  session_start();

  $BillType = $_POST["BillType"];

  $_SESSION["BillType"] = $BillType;


  print_r($_SESSION["email"]);
  print_r($_SESSION["BillType"]);
  

?>