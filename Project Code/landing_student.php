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
            <a class="navbar-item" href="index.php">Logout</a>
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
    	
      ?>


		  <br>
      <a class="button is-primary" href="class.php">Join new class</a>


  	</div>


	</div>

      

  </div>

</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Bulma is amazing!</p></div></div>

</section>



</body>
</html>



