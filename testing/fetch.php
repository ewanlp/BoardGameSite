<?php

if(!isset($_SESSION)) {
  session_start();
}
require_once '../ePHP/class.user.php';
$user_fetch = new USER();
include('function.php');
/*if ($_POST['key'] == 'addNew'){
	$name = $_POST['name'];
	$idd = $_POST['idd'];
	$queryy = $userPlayer->runQuery("SELECT 'id' FROM 'players' WHERE 'name' = $name");
	if ($queryy->fetchColumn() > 0) {
		exit("This name already exists. Try a different one.");
	} else {
		$queryy = $userPlayer->runQuery("INSERT INTO players (name, id)
			values (:name, :idd)
		");
		$result = $queryy->execute(
			array(
				':name' => $name,
				'idd' => $idd
			)
		);
	}
}*/
$query = '';
$output = array();
$query .= "SELECT * FROM players ";
if(isset($_POST["search"]["value"])) {
	$query .= 'WHERE name LIKE "%'.$_POST["search"]["value"].'%" ';
}
if(isset($_POST["order"])) {
	$query .= 'ORDER BY `name` '.$_POST['order']['0']['dir'].' ';
} else {
	$query .= 'ORDER BY name ASC ';
}

if($_POST["length"] != -1) {
	$query .= 'LIMIT ' .$_POST['start']. ', ' .$_POST['length']. ' ';
}
$statement = $user_fetch->runQuery($query);
$statement->execute();
$result = $statement->fetchAll();
$data = array();
$filtered_rows = $statement->rowCount();
foreach($result as $row) {
	$sub_array = array();
	$sub_array[] = $row["name"];
	$sub_array[] = '<button type="button" name="update" id="'.$row["id"].'" class="btn btn-warning btn-xs update">Update</button>';
	$sub_array[] = '<button type="button" name="delete" id="'.$row["id"].'" class="btn btn-danger btn-xs delete">Delete</button>';
	$data[] = $sub_array;
}
$output = array(
	"draw"				=>	intval($_POST["draw"]),
	"recordsTotal"		=> 	$filtered_rows,
	"recordsFiltered"	=>	get_total_all_records(),
	"data"				=>	$data
);
echo json_encode($output);
?>
