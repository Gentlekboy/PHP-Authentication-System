<?php
    session_start();

    if(isset($_SESSION["loggedin"]) && !empty($_SESSION["loggedin"])) {
      header("Location: dashboard.php");
    }
  include_once("lib/header.php");
?>
  <title>SNG: Login</title>
  
  </head>
  <body>
    <h1>LOGIN TO SNG HOSPITAL</h1>
    <p>
      <?php
        if(isset($_SESSION["message"]) && !empty($_SESSION["message"])) {
          echo "<span style='color:green'>" . $_SESSION["message"] . "</span>";

          session_destroy();
        }
      ?>
    </p>
    
    <form action="process/processlog.php" method="POST">
      <p>
        <?php
          if(isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
            echo "<span style='color:red'>" . $_SESSION["error"] . "</span>";

            session_destroy();
          }
        ?>
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