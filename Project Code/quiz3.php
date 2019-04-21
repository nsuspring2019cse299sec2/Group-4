<?php

session_start();
$quesno = $_SESSION['quesno'];
$currques = $_SESSION['currques'];
$cid = $_SESSION['cid'];
$qid = $_SESSION['qid'];


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
      
      if($currques>($quesno))
      {
        echo "<div class='notification is-success'>
               Quiz successfully created.
              </div>";
      }
      else
      {
        echo "

        <form action='quiz4.php' method='post'>
          

          <div class='field'>
          <label class='label'>Question #" . $currques . "</label>
          <div class='control'>
            <input class='input is-large' name='quescontent' type='text' placeholder=''>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Option 1:</label>
          <div class='control'>
            <input class='input' name='opcontent_1' type='text' placeholder=''>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Option 2:</label>
          <div class='control'>
            <input class='input' name='opcontent_2' type='text' placeholder=''>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Option 3:</label>
          <div class='control'>
            <input class='input' name='opcontent_3' type='text' placeholder=''>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Option 4:</label>
          <div class='control'>
            <input class='input' name='opcontent_4' type='text' placeholder=''>
          </div>
          </div>
          <br>
          <label class='label'>Correct option: </label>
          <div class='select'>
          <select name='op_correct'>
           <option value = '1'> 1 </option>
           <option value = '2'> 2 </option>
           <option value = '3'> 3 </option>
           <option value = '4'> 4 </option>
          </select>
          </div>
          <br>
          
        
        
        <br>
        <div class='field is-grouped'>
          <div class='control'>
            <button class='button is-success' type='submit'>Submit</button>
          </div>
        </div>
        </form>

        ";
        
      }
      



        ?>

        
  	</div>


	</div>

      

  </div>

</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Bulma is amazing!</p></div></div>

</section>



</body>
</html>



