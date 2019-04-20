

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

  <script>
  window.onload = function () {

  var chart = new CanvasJS.Chart("chartContainer", {
    animationEnabled: true,
    theme: "light2", // "light1", "light2", "dark1", "dark2"
    title:{
      text: "Class performance"
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
        { y: 2, label: "A" },
        { y: 8,  label: "B" },
        { y: 9,  label: "C" },
        { y: 8,  label: "D" },
        { y: 3,  label: "F" }
      ]
    }]
  });
  chart.render();

  }
  </script>



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
            <a class="navbar-item is-active" href="welcome.php">Home</a>
            <a class="navbar-item" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>
  </div>

  <section class="hero is-light">
  <div class="hero-body">

    <div class="container">
      
    	<p><b>Welcome! Your class performance: </b></p>
    	<br>
    	<div id="chartContainer" style="height: 370px; max-width: 920px; margin: 0px auto;"></div>
		<script src="canvasjs.min.js"></script>



  	</div>


	</div>

      

  </div>

</section>

<div class="hero-foot"><div class="container has-text-centered"><p>Bulma is amazing!</p></div></div>

</section>



</body>
</html>



