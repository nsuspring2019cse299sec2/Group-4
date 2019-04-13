<?php

session_start()

?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CSE 299</title>
    <link rel="stylesheet" href="bulma.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <style>
    
  </style>

  



  </head>


<body>


  <section class="hero is-danger">
  <div class="hero-head">
    <nav class="navbar">
      <div class="container">
        <div class="navbar-brand">
          <a class="navbar-item">
            <p>CSE 299</p>
          </a>
          <span class="navbar-burger burger" data-target="navbarMenuHeroB">
            <span></span>
            <span></span>
            <span></span>
          </span>
        </div>
        <div id="navbarMenuHeroB" class="navbar-menu">
          <div class="navbar-end">
            <a class="navbar-item is-active" href="landing.php">Home</a>
            <a class="navbar-item" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <section class="hero is-light">
  <div class="hero-body">

    <div class="container">
      <?php
      
      $email = $_SESSION['email'];
      $usr_id = $_SESSION['usr_id'];
      
      ?>
      
    	<p><b>Welcome,<?php echo $email; ?>!</b></p>
    	<hr>
      <p>Your classes: </p><br>
    	

      <?php

      require "connection.php";


      $sql = "
          SELECT *
          FROM class
          WHERE tid = '$usr_id'";

      $result = mysqli_query($conn, $sql);


      echo "<table class='table is-fullwidth is-striped is-bordered'>
          <tr>
            <th>Name</th>
            <th>Date Created</th>
            <th>Access Code</th>
          </tr>";
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>
            <td>" . $row['name'] . "</td>" .
            "<td>" . $row['date'] . "</td>" .
            "<td>" . $row['code'] . "</td>" .
            "</tr>" ;
      }


      echo "</table>";
      ?>


		  <br>
      <a class="button is-primary" href="class.php">Add new class</a><br><br>

      <p>New requests: </p>
      <?php

      require "connection.php";


      $sql = "
          SELECT c.name AS cname, s.email AS semail, e.ID as ID, s.sid AS sid, c.cid AS cid
          FROM enrolled e, class c, s_users s
          WHERE c.tid = '$usr_id' AND e.cid=c.cid AND e.accepted=0 AND s.sid=e.sid";

      $result = mysqli_query($conn, $sql);


      echo "<table class='table is-fullwidth is-striped is-bordered'>
          <tr>
            <th>Class name</th>
            <th>Email</th>
            <th>ID</th>
            <th></th>
          </tr>";
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>
            <td>" . $row['cname'] . "</td>" .
            "<td>" . $row['semail'] . "</td>" .
            "<td>" . $row['ID'] . "</td>" .
            "<td><a href='accept_student.php?sid=" . $row['sid']. "&cid=". $row['cid'] ."'><u>Accept</u></a></td>" .
            "</tr>" ;
      }


      echo "</table>";
      ?>


  	</div>


	</div>

      

  </div>

</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Bulma is amazing!</p></div></div>

</section>



</body>
</html>



