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


      if($_GET["cid"])
      {
        $cid = $_GET['cid'];
      }

      $_SESSION['cid'] = $cid;

      require "connection.php";

      $sql = "
          SELECT *
          FROM class
          WHERE cid = '$cid'";

      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<p>Welcome to your class <b>" . $row['name'] . "</b>!</p><br>";
      }




      $sql = "
          SELECT *
          FROM quiz
          WHERE cid = '$cid'";

      $result = mysqli_query($conn, $sql);

      echo "

      <p>Quizzes in this class: </p><br>

      ";

      echo "<table class='table is-fullwidth is-striped is-bordered'>
          <tr>
            <th>Name</th>
            <th>Number of questions</th>
            <th>Time</th>
            <th></th>
          </tr>";
      while ($row = mysqli_fetch_assoc($result))
      {
        $temp = $row['qid'];
        $sql = "
          SELECT *
          FROM marks
          WHERE qid = '$temp' AND cid = '$cid' AND sid = '$usr_id'";

        $result2 = mysqli_query($conn, $sql);

        $rowcount = mysqli_num_rows($result2);

        echo "<tr>
            <td>" . $row['name'] . "</td>" .
            "<td>" . $row['quesno'] . "</td>" .
            "<td>" . $row['time'] . "</td>";

        if($rowcount==0)
        {
          echo "<td>" . "<a href='take_quiz.php?qid=" . $row['qid'] . "'><u>Take quiz</u></a></td>" ;
        }
        else echo "Quiz taken";

            
        echo "</tr>" ;
        
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



