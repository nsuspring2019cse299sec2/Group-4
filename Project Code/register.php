<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register</title>
    <link rel="stylesheet" href="bulma.css">
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    

  </head>


<body>

  <section class="hero is-danger is-fullheight">
  <div class="hero-body">
    <div class="container">
      <div class="columns is-centered">
        <div class="column is-5-tablet is-4-desktop is-3-widescreen">
        <div class="box">

        <p><b>CSE 299</b></p>
        <hr>

        <?php
        $usr_type = -10;
        
        if(isset($_GET["usr_type"])) $usr_type= $_GET["usr_type"];

        if(isset($_GET["error"]))
        {
          echo "<div class='notification is-warning'>
               Error. Please try again.
              </div>
              <p>Chose your user type: </p><br>
                <b><a href='register.php?usr_type=2'>I am a teacher</a></b><br>
                <b><a href='register.php?usr_type=3'>I am a student</a></b><br><hr>
              ";
        }

        if($usr_type==1)
        {
          echo "<p>Chose your user type: </p><br>
                <b><a href='register.php?usr_type=2'>I am a teacher</a></b><br>
                <b><a href='register.php?usr_type=3'>I am a student</a></b><br><hr>
                ";
        }
        

        if($usr_type==2)
        {
          echo "
          <form action='confirmRegister.php?usr_type=2' method='post'>
          <div class='field'>
          <label class='label'>Email:</label>
          <div class='control'>
            <input class='input' name='email' type='text' placeholder='email@gmail.com'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Password:</label>
          <div class='control'>
            <input class='input' name='password' type='password' placeholder='password'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Confirm password:</label>
          <div class='control'>
            <input class='input' name='password2' type='password' placeholder='password'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Institution</label>
          <div class='control'>
            <input class='input' name='institution' type='text' placeholder='NSU,IUB,etc'>
          </div>
          
        
        <br>
        <div class='field is-grouped'>
          <div class='control'>
            <button class='button is-success' type='submit'>Submit</button>
          </div>
        </div>
        </form>

          ";
        }

        if($usr_type==3)
        {
          echo "
          <form action='confirmRegister.php?usr_type=3' method='post'>
          <div class='field'>
          <label class='label'>Name:</label>
          <div class='control'>
            <input class='input' name='name' type='text' placeholder='e.g.Sohel Rahman'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Email:</label>
          <div class='control'>
            <input class='input' name='email' type='text' placeholder='email@gmail.com'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Password:</label>
          <div class='control'>
            <input class='input' name='password' type='password' placeholder='password'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Confirm password:</label>
          <div class='control'>
            <input class='input' name='password2' type='password' placeholder='password'>
          </div>
          </div>
          <div class='field'>
          <label class='label'>Age</label>
          <div class='control'>
            <input class='input' name='age' type='text' placeholder='22'>
          </div>
          <div class='field'>
          <label class='label'>Institution</label>
          <div class='control'>
            <input class='input' name='institution' type='text' placeholder='NSU,IUB,etc'>
          </div>
          
        
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
        
        
        <br>
        </div>
        </div>
      </div>
    </div>
  </div>
  </section>


</body>
</html>


