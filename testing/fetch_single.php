<?php
session_start();
require_once '../ePHP/class.user.php';
$user_dataM = new USER();
include('function.php');
if(isset($_POST["user_id"]))
{
 $output = array();
 $statement = $user_dataM->runQuery(
  "SELECT * FROM players
  WHERE id = '".$_POST["user_id"]."'
  LIMIT 1"
 );
 $statement->execute();
 $result = $statement->fetchAll();
 foreach($result as $row)
 {
  $output["name"] = $row["name"];
  $output["id"] = $row["id"];
 }
 echo json_encode($output);
}
?>
