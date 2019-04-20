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
      $cid = $_SESSION['cid'];

      if($_GET["qid"])
      {
        $qid = $_GET['qid'];
      }

      require "connection.php";

      $sql = "
          SELECT *
          FROM quiz
          WHERE qid = '$qid'";

      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result))
      {
        $quesno = $row['quesno'];
        $time = $row['time'];
        $quizname = $row['name'];
      }

      echo "<p><b><u>" . $quizname . "</u></b></p><br>";

      $sql = "
          SELECT *
          FROM questions
          WHERE qid = '$qid'";

      $result1 = mysqli_query($conn, $sql);

      echo "<form action='take_quiz2.php' method='post'>";

      while ($row1 = mysqli_fetch_assoc($result1))
      {
        $currquesnum = $row1['num'];
        $temp = $currquesnum-1;

        echo "<div class='field'>
              <div class='control'>
              <label class='label'>Question " . $row1['num'] . ": " . $row1['content'] . "</label>" ;


        $sql = "
          SELECT *
          FROM options
          WHERE qid = '$qid' AND quesno = '$currquesnum'";

        $result2 = mysqli_query($conn, $sql);

        while ($row2 = mysqli_fetch_assoc($result2))
        {
          echo "<label class='radio'>
                <input type='radio' name='answer[" . $temp . "]' value='" . $row2['num'] . "'>" . $row2['opcontent'] . "</label><br>";

        }

        echo "<label class='radio'>
                <input type='radio' name='answer[" . $temp . "]' value='-1' checked>
                Don't know
                </label><br>";

        echo "</div>
              </div>";
      }


      echo "<br><div class='field is-grouped'>
            <div class='control'>
              <button class='button is-success' type='submit'>Submit</button>
            </div>
            </div>
            </form>";

      ?>
      
    	


  	</div>


	</div>

      

  </div>

</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Bulma is amazing!</p></div></div>

</section>



</body>
</html>



