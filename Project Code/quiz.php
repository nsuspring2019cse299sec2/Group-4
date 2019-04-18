<?php

session_start();
if($_GET["cid"])
      {
        $cid = $_GET['cid'];
      }


$_SESSION['cid'] = $cid;

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

      if(isset($_GET["error"]))
        {
          echo "<div class='notification is-warning'>
               Error. Please try again.
              </div>
              ";
        }

        ?>
      
      <form action='quiz2.php' method='post'>
          <div class='field'>
          <label class='label'>Quiz name:</label>
          <div class='control'>
            <input class='input' name='name' type='text' placeholder='e.g. Quiz#1'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Number of questions:</label>
          <div class='control'>
            <input class='input' name='quesno' type='text' placeholder='e.g. 12'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Time (minutes):</label>
          <div class='control'>
            <input class='input' name='time' type='text' placeholder='45'>
          </div>
          </div>
          
          
        
        <br>
        <div class='field is-grouped'>
          <div class='control'>
            <button class='button is-success' type='submit'>Submit</button>
          </div>
        </div>
        </form>

  	</div>


	</div>

      

  </div>

</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Bulma is amazing!</p></div></div>

</section>



</body>
</html>



