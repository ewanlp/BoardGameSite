<?php
session_start();
require_once '../ePHP/class.user.php';
$user_dataM = new USER();


/************** Query all that ish **************/
  $query = $user_dataM->runQuery("SELECT * FROM players ORDER BY name");
  //only need to bind params when they're used in the query
  $query->execute();


/************** End of that query yo **************/

?>

<html>
<style>
body {
    background: linear-gradient(to bottom, #33ccff 0%, #66ffcc 100%);
}
hr.style18 {
  height: 30px;
  border-style: solid;
  border-color: dark;
  border-width: 6px 0 0 0;
  border-radius: 20px;
}
hr.style18:before {
  display: block;
  content: "";
  height: 30px;
  margin-top: -31px;
  border-style: solid;
  border-color: dark;
  border-width: 0 0 1px 0;
  border-radius: 20px;
}
</style>
<head>
  <title>Your Data</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.3/css/bootstrap-select.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
  <script rel="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
</head>
<body>
<nav class="navbar navbar-toggleable-md navbar-inverse bg-info">
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

<div id="heading" class="container-fluid text-center">

<!--Start of the Heading, and sorting buttons-->

	<div class="row">
		<div class="col-6 offset-3">
      <h1>
				Players
			</h1>
      <hr class="style18">
      <br>
    </div>
    <div class="col-8 offset-2">
      <h5>
        Welcome to the Players page. Select a Player to find out more info about them, or sort a group to see what others have been up to!
      </h5>
      <br><br>
    </div>
  </div>

<!--Start of buttons-->
	<div class="row">
    <div class="col-8 offset-2">
      <form class="form-group" role="form" method="post">
        <div class="btn-group-lg" data-toggle="buttons">
          <button type="button" class="btn btn-info active" name="Alpha" data-toggle="collapse" data-target="#collapseExample"> Alphabetical </button>
          <button type="button" class="btn btn-info" name="Recent" data-toggle="collapse" data-target="#collapseExample"> Recent Play </button>
          <button type="button" class="btn btn-info" name="Plays" data-toggle="collapse" data-target="#collapseExample"> Most Plays </button>
          <button type="button" class="btn btn-info" name="Wins" data-toggle="collapse" data-target="#collapseExample"> Wins </button>
        </div>
      </form>
    </div>
  </div>

  <br><br>
<!--Start of second group of buttons-->

  <br>
</div>

<!--Start of the table!-->

<div id="table" class="container-fluid text-center">
  <div class="row">
    <div class="col-8 offset-2">
      <div id="collapseExample" class="collapse">
        <table class="table table-striped table-bordered table-hover table-small">
          <thead class="thead-inverse">
            <tr>
              <th>Name</th>
              <th>id</th>
            </tr>
          </thead>
          <tbody>
            <?php while ($row = $query->fetch(PDO::FETCH_ASSOC)){ ?>
    					<tr>
    						<td><?php echo htmlspecialchars($row['name']) ?></td>
    						<td><?php echo htmlspecialchars($row['id']) ?></td>
    					</tr>
    				<?php } ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>


<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>
