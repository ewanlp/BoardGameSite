<?php

if(!isset($_SESSION)) {
  session_start();
}
require_once '../ePHP/class.user.php';
function get_total_all_records() {
	$user_function = new USER();
	$statement = $user_function->runQuery("SELECT * FROM players");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>
