<?php
  session_start();
  if(isset($_SESSION["loggedin"]) && !empty($_SESSION["loggedin"])) {
    header("Location: dashboard.php");
  }

  include_once("lib/header.php");
  require_once("function/alert.php");

?>
  <title>SNGH: Register</title>
  </head>
  <body>

    <p>Register for your SNG account</p>

    <form action="process/processreg.php" method="POST">
      <p>
        <?php print_alert(); ?>
      </p>

      <p>
        <label for="firstname">First Name:</label><br>
        <input 
          <?php
            if(isset($_SESSION['firstname'])){
              echo "value=" . $_SESSION['firstname'];
            }
          ?>
        id="firstname" name="firstname" placeholder="Your First Name Here" type="text">
      </p>

      <p>
        <label for="lastname">Last Name:</label><br>
        <input
          <?php
            if(isset($_SESSION['lastname'])){
              echo "value=" . $_SESSION['lastname'];
            }
          ?>
           id="lastname" name="lastname" placeholder="Your Last Name Here" type="text">
      </p>

      <p>
        <label for="email">Email:</label><br>
        <input
          <?php
            if(isset($_SESSION['email'])){
              echo "value=" . $_SESSION['email'];
            }
          ?>
         id="email" name="email" placeholder="Your Email Here" type="email">
      </p>

      <p>
        <label>Gender:</label><br>
        <input
          <?php
            if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'male'){
              echo "selected";
            }
          ?>
        id="male" name="gender" type="radio" value="male"><label for="male">Male</label>
        <input
          <?php
            if(isset($_SESSION['gender']) && $_SESSION['gender'] == 'female'){
              echo "selected";
            }
          ?>
        id="female" name="gender" type="radio" value="female"><label for="female">Female</label>
      </p>

      <p>
        <label>Designation:</label><br>
        <input
          <?php
            if(isset($_SESSION['designation']) && $_SESSION['gender'] == 'personnel'){
              echo "selected";
            }
          ?>
        id="medicalpersonnel" name="designation" type="radio" value="medicalpersonnel">
        <label for="medicalpersonnel">Medical Personnel</label>
        <input
          <?php
            if(isset($_SESSION['designation']) && $_SESSION['gender'] == 'patient'){
              echo "selected";
            }
          ?>
        id="patient" name="designation" type="radio" value="patient"><label for="patient">Patient</label>
      </p>

      <p>
        <label for="department">Department:</label><br>
        <input
          <?php
            if(isset($_SESSION['department'])){
              echo "value=" . $_SESSION['department'];
            }
          ?>
        id="department" name="department" placeholder="Your Department Here" type="text">
      </p>

      <p>
        <label for="password">Password:</label><br>
        <input
          <?php
            if(isset($_SESSION['password'])){
              echo "value=" . $_SESSION['password'];
            }
          ?>
          id="password" name="password" placeholder="Your Password Here" type="password">
      </p>

      <p>
        <button type="submit">Register</button>
      </p>
    </form>

    <a href="login.php">Login</a> |
    <a href="index.php">Homepage</a>

<?php
  include_once("lib/footer.php");
?>