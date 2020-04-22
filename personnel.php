<?php
  include_once("lib/header.php")
?>
  <title>SNGH: Dashboard</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
  </head>
  <body>

    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Dashboard - Medical Personnel</h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="tasks.php">Tasks</a>
      <a class="p-2 text-dark" href="sick.php">Patients</a>
      <a class="p-2 text-dark" href="wards.php">Wards</a>
      <a class="p-2 text-dark" href="cmd.php">Message the CMD</a>
      <a class="p-2 text-dark" href="test.php">Test Results</a>

    </nav>
    </div>

    <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Welcome To Your Dashboard</h1>
      <p class="lead">A Hospital that cures ignorance</p>
      <p class="lead">Come as you are!</p>
      <p>
        <a type="button" class="btn btn-bg btn-outline btn-secondary" href="logout.php">Logout</a>
        <a type="button" class="btn btn-bg btn-outline btn-primary" href="reset.php">Reset Password</a>
      </p>
    </div>


<?php
  include_once("lib/footer.php")
?>