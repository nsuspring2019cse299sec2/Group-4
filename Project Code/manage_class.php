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


      if($_GET["cid"])
      {
        $cid = $_GET['cid'];
      }

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

      
      ?>

      <p>Quizzes in this class: </p><br>

      <a class="button is-primary" href="quiz.php?cid=<?php echo $cid ?>">Add new quiz</a><br><br>

      <p>Students enrolled in this class: </p><br>

      <?php 

      $sql = "
          SELECT *
          FROM enrolled e, s_users s
          WHERE e.cid = '$cid' and s.sid=e.sid";


      $result = mysqli_query($conn, $sql);


      echo "<table class='table is-fullwidth is-striped is-bordered'>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Institution</th>
          </tr>";
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>
            <td>" . $row['name'] . "</td>" .
            "<td>" . $row['email'] . "</td>" .
            "<td>" . $row['institute'] . "</td>" .
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



