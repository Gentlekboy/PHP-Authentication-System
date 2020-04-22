<?php
    session_start();

    if(isset($_SESSION["loggedin"]) && !empty($_SESSION["loggedin"])) {
      header("Location: dashboard.php");
    }
  include_once("lib/header.php");
  require_once("function/alert.php");
?>
  <title>SNGH: Login</title>
  
  </head>
  <body>
    <h1>LOGIN TO SNG HOSPITAL</h1>

    <p>
    <?php print_alert(); ?>
    </p>
    
    <form action="process/processlog.php" method="POST">

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
        <button type="submit">Login</button>
      </p>
    </form>
    
    <a href="register.php">Register</a> |
    <a href="forgot.php">Forgot Password</a> |
    <a href="index.php">Homepage</a>

<?php
  include_once("lib/footer.php");
?>