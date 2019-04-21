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

      <div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
    <script src="canvasjs.min.js"></script>

    <?php 


      if($_GET["qid"])
      {
        $qid = $_GET['qid'];
      }

      $cid = $_SESSION['cid'];

      /*
      require "connection.php";


      $sql = "
          SELECT q.name AS quizname, m.number AS mark, s.name AS studentname, s.email AS studentemail
          FROM s_users s, marks m, quiz q
          WHERE m.qid = '$qid' AND m.qid = q.qid AND m.sid = s.sid AND m.cid = '$cid'";

      $result = mysqli_query($conn, $sql);

      echo "

      <p>Showing grades for this quiz: </p><br>

      ";

      echo "<table class='table is-fullwidth is-striped is-bordered'>
          <tr>
            <th>Student name</th>
            <th>Email</th>
            <th>Mark</th>
          </tr>";
      while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>
            <td>" . $row['studentname'] . "</td>" .
            "<td>" . $row['studentemail'] . "</td>" .
            "<td>" . $row['mark'] . "</td>" .
            "</tr>" ;
      }


      echo "</table>";*/
      ?>  

      <script>
        window.onload = function () {

        var chart = new CanvasJS.Chart("chartContainer", {
          animationEnabled: true,
          theme: "light2", // "light1", "light2", "dark1", "dark2"
          title:{
            text: "Quiz results"
          },
          axisY: {
            title: "Mark"
          },
          data: [{        
            type: "column",  
            showInLegend: true, 
            legendMarkerColor: "white",
            legendText: "Name of student",
            dataPoints: [    
            <?php  

            require "connection.php";


            $sql = "
                SELECT q.name AS quizname, m.number AS mark, s.name AS studentname, s.email AS studentemail
                FROM s_users s, marks m, quiz q
                WHERE m.qid = '$qid' AND m.qid = q.qid AND m.sid = s.sid AND m.cid = '$cid'";

            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result))
            {
              echo "{ y: " . $row['mark'] . ", label: '" . $row['studentname'] . "'},";
              $temp = $row['quizname'];
            }


            ?>
              //{ y: 2, label: "A" },
              //{ y: 8,  label: "B" },
              //{ y: 9,  label: "C" },
              //{ y: 8,  label: "D" },
              //{ y: 3,  label: "F" },
              //{ y: 16,  label: "J" },
            ]
          }]
        });
        chart.render();

        }
        </script>

        <?php  echo "<br><p><center>Showing results of " . $temp . "</center></p>"?>

  	</div>


	</div>

      

  </div>

</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Bulma is amazing!</p></div></div>

</section>



</body>
</html>



