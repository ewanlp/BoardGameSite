<?php
session_start();
require_once 'ePHP/class.user.php';
$user_dataM = new USER();
?>

<html>
<head>
  <title>Your Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/open-iconic/1.1.1/font/css/open-iconic-bootstrap.css">
  <script rel="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>

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
				<button type="button" class="btn btn-primary"><span class="oi oi-plus"></span>        Add a Play      <span class="oi oi-plus"></span></button>
				<br>
				<a href="pages/players.php" class="btn btn-info" role="button"><span class="oi oi-person"></span>        Players        <span class="oi oi-person"></span></a>
				<br>
				<button type="button" class="btn btn-success"><span class="oi oi-puzzle-piece"></span>        Games        <span class="oi oi-puzzle-piece"></span></button>
				<br>
				<button type="button" class="btn btn-warning"><span class="oi oi-pie-chart"></span>        Stats        <span class="oi oi-pie-chart"></span></button>
				<br>
				<button type="button" class="btn btn-danger"><span class="oi oi-calendar"></span>        History        <span class="oi oi-calendar"></span></button>
				<br>
			</div>
		</div>
		<div class="col"></div>
		</div>
	</div>
</div>

<!-- Latest board game play shown here -->
<script
  src="https://code.jquery.com/jquery-3.2.1.js"
  integrity="sha256-DZAnKJ/6XZ9si04Hgrsxu/8s717jcIzLy3oi35EouyE="
  crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
