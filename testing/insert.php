<?php
session_start();
require_once '../ePHP/class.user.php';
$user_dataM = new USER();
include('function.php');
if(isset($_POST["operation"]))
{
 if($_POST["operation"] == "Add")
 {
  $statement = $user_dataM->runQuery("
   INSERT INTO users (name, id)
   VALUES (:name, :id)
  ");
  $result = $statement->execute(
   array(
    ':name' => $_POST["name"],
    ':id' => $_POST["id"]
   )
  );
  if(!empty($result))
  {
   echo 'Data Inserted';
  }
 }
}

?>
