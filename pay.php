<?php
  session_start();

  include_once("lib/header.php");

  require_once("function/token.php");
  require_once("function/alert.php");
  require_once("function/redirect.php");
  require_once("function/user.php");
?>

  <title>SNGH: Pay</title>

  </head>
  <body>

  <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="index.php">SNG Hospital</a></h5>
    <nav class="my-2 my-md-0 mr-md-3">
      <a class="p-2 text-dark" href="aboutus.php">About Us</a>
      <a class="p-2 text-dark" href="contactus.php">Contact Us</a>
    </nav>
  </div>

  <div class="container">
    <div class="row col-6">
      <h3>PAY BILLS HERE</h3>
    </div>

    <div class="row col-6">
      <form action="process/processpay.php" method="POST">
        <p>
          <?php
            print_alert();
            set_alert();
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
          id="email" class="form-control" name="email" placeholder="Your Email Here" type="email">
        </p>

        <p>
          <label>Choose Payment Options Below:</label><br>
          <select name="BillType">
            <option>Select One</option>
            <option value="500">Tests: NGN500</option>
            <option value="5000">Lens Frames: NGN5000</option>
            <option value="1000">Appointment: NGN1000</option>
          </select>
        </p>
 
        <p>
          <button class="btn btn-sm btn-primary" type="submit">Pay</button>
        </p>
      </form>
    </div>
  <a class="p-2 text-dark" href="register.php">Register</a> |
  <a class="p-2 text-dark" href="forgot.php">Forgot Password</a>
  </div>

<?php
  include_once("lib/footer.php");
?>