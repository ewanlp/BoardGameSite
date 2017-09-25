<?php
session_start();
require_once 'ePHP/class.user.php';
$user_dataM = new USER();


/************** Query all that ish **************/



/************** End of that query yo **************/

?>

<html>
<head>
  <title>Your Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css">
  <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <!--<link href="../css/hStyle-bg.css" rel="stylesheet" type="text/css">-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
  <script rel="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/js/bootstrap-select.min.js"></script>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="#">Navbar</a>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Features</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Pricing</a>
      </li>
    </ul>
  </div>
</nav>

<br><br><br><br>


<div class="container-fluid text-center">
	<div class="row justify-content-center">
		<div class="col-md-8">
				<h1>
					Welcome to the Board Game Page!
				</h1>
		</div>
	</div>
</div>

<br><br>

<div id="heading" class="container-fluid text-center">
	<div class="row">
		<div class="col"></div>
		<div class="col-8">
			<div class="btn-group-vertical btn-block" role="group" aria-label="">
				<button type="button" class="btn btn-primary">Add a Play</button>
				<br>
				<a href="pages/players.php" class="btn btn-info" role="button"><span class="glyphicon glyphicon-user"> Players <span class="glyphicon glyphicon-user"></a>
				<br>
				<button type="button" class="btn btn-success">Games</button>
				<br>
				<button type="button" class="btn btn-warning">Stats</button>
				<br>
				<button type="button" class="btn btn-danger">History</button>
				<br>
			</div>
		</div>
		<div class="col"></div>
		</div>
	</div>
</div>

<!-- Latest board game play shown here -->


</body>
</html>
