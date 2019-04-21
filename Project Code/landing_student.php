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
            <a class="navbar-item is-active" href="landing_student.php">Home</a>
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
      
    	<p><b>Welcome,<?php echo $email; ?>!</b></p><br>
      <p>Your classes: </p><br>
    	
      <?php

      require "connection.php";


      $sql = "
          SELECT *
          FROM enrolled e, class c
          WHERE e.sid = '$usr_id' AND e.cid=c.cid AND e.accepted=1";

      $result = mysqli_query($conn, $sql);


      echo "<table class='table is-fullwidth is-striped is-bordered'>
          <tr>
            <th>Name</th>
            <th>Date Created</th>
            <th></th>
          </tr>";
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>
            <td>" . $row['name'] . "</td>" .
            "<td>" . $row['date'] . "</td>" .
            "<td>" . "<a href='viewclass_student.php?cid=" . $row['cid'] . "'><u>Go to class</u></a>" . "</td>" .
            "</tr>" ;
      }


      echo "</table>";
      ?>


		  <br>
      <a class="button is-primary" href="join_class.php">Join new class</a>

      <br><br><br><p>Your grade history: </p><br>

      <?php

      require "connection.php";


      $sql = "
          SELECT c.name AS classname, q.name AS quizname, m.number AS quizmarks
          FROM enrolled e, class c, marks m, quiz q
          WHERE e.sid = '$usr_id' AND e.cid=c.cid AND e.accepted=1 AND m.cid=e.cid AND m.qid = q.qid AND m.sid = '$usr_id'";

      $result = mysqli_query($conn, $sql);


      echo "<table class='table is-fullwidth is-striped is-bordered'>
          <tr>
            <th>Class</th>
            <th>Quiz</th>
            <th>Marks</th>
          </tr>";
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>
            <td>" . $row['classname'] . "</td>" .
            "<td>" . $row['quizname'] . "</td>" .
            "<td>" . $row['quizmarks'] .  "</td>" .
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



