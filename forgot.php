<?php
  include_once("lib/header.php");
?>
  <h1>Forgot Password</h1>
  <p>Provide the email address associated with your account in the field below:</p>

  <form action="process/processforgot.php" method="POST">
    <p>
      <?php
        if(isset($_SESSION["error"]) && !empty($_SESSION["error"])) {
          echo "<span style='color:red'>" . $_SESSION["error"] . "</span>";

          session_destroy();
        }
      ?>
    </p>
    
    <label for="email">Email:</label><br>
    <input
      <?php
        if(isset($_SESSION['email'])){
          echo "value=" . $_SESSION['email'];
        }
      ?>
    id="email" name="email" placeholder="Your Email Here" type="email">

    <p>
      <button type="submit">Submit</button>
    </p>
  </form>

  <a href="index.php">Home</a> |
  <a href="register.php">Register</a> |
  <a href="login.php">Login</a>
<?php
  include_once("lib/footer.php");
?>