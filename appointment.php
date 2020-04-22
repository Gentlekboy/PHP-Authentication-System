<?php
  session_start();

?>
  <title>SNGH: Book Appointment</title>
  </head>
  <body>

  <h2>Have Any Issues?</h2>
  <p>Book an appointment with us.</p>
  
  <form action="process/processappoint.php" method="POST">

    <label for="date">Date of appointment:</label><br>
    <input id="date" name="date" placeholder="Enter Date Here" type="text/number"><br>

    <label for="time">Time of appointment:</label><br>
    <input id="time" name="time" placeholder="Enter Time Here" type="number"><br>

    <label for="nature">Nature of appointment:</label><br>
    <input id="nature" name="nature" placeholder="Enter Nature Of Appointment Here" type="text"><br>

    <label for="complaint">Complaint:</label><br>
    <textarea id="complaint" name="complaint" placeholder="Your Complaint Here" type="text"></textarea><br>

    <label for="department">Department:</label><br>
    <input id="department" name="department" placeholder="Your Department Here" type="text"><br>

  </form>

  <a href="patient.php">Dashboard</a>

<?php
  include_once("lib/footer.php");
?>