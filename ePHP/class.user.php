<?php
#dbconfig has an obj that connects us to the db
require_once 'dbconfig.php';
#start of user class
class USER
{

 private $conn;
 
 //constructs the db from the dbconfig file
 public function __construct()
 {
  $database = new Database();
  $db = $database->dbConnection();
  $this->conn = $db;
    }
 //method that takes an sql statement, prepares it to be returned as an obj.
 //Says that the current user's conn now has var called stmt,
 public function runQuery($sql)
 {
  $stmt = $this->conn->prepare($sql);
  return $stmt;
 }
 
 //function that returns the last inserted row or sequence value (the id of the user!)
 public function lasdID()
 {
  $stmt = $this->conn->lastInsertId();
  return $stmt;
 }
 

 
 //function that takes user info, and executes it. This will put info in the user table! Makes a new user in db
 public function register($first,$last,$uname,$email,$upass,$code)
 {
  try
  {       
   $password = md5($upass);
   $stmt = $this->conn->prepare("INSERT INTO tbl_users(fName,lName,userName,userEmail,userPass,tokenCode) 
                                                VALUES(:fN, :lN, :user_name, :user_mail, :user_pass, :active_code)");
   $stmt->bindparam(":fN",$first);
   $stmt->bindparam(":lN",$last);
   $stmt->bindparam(":user_name",$uname);
   $stmt->bindparam(":user_mail",$email);
   $stmt->bindparam(":user_pass",$password);
   $stmt->bindparam(":active_code",$code);
   //once execute is called, then everything gets bound to e/o uN to uN and so on
   $stmt->execute(); 
   return $stmt;
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 /*The steps of printing results in PDO...
 1) prepare a query, and set it = to a var
 2) execute either using bound params(see above example) or array temp values
 3) set var = to fetch of that stmt
*/ 
 //function that takes basic login info, and prepares execution by preparing from user tbl
 public function login($email,$upass)
 {
  try
  {
   //prepares stmt and gets the userEmail. 
   $stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userEmail=:email_id");
   //you can execute by binding params to v's that are passed in, or you can use an array which uses placeholders.
   $stmt->execute(array(":email_id"=>$email));
   //userRow is the result of the stmt, it needs to be fetched. 
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
    if($userRow['userStatus']=="Y")
    {
     if($userRow['userPass']==md5($upass))
     {
      $_SESSION['userSession'] = $userRow['userID'];
	  $_SESSION['guest'] = false;
	  //if the user info is all correct...
      return true;
     }
     else
     {
      header("Location: index.php?error"); //error with pass!
      exit;
     }
    }
    else
    {
     header("Location: index.php?inactive");//the user has not activated their acct!
     exit;
    } 
   }
   else
   {
    header("Location: index.php?error");//error with too many registered accts under this email
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 public function loginUser($uN,$upass)
 {
  try
  {
   //prepares stmt and gets the userEmail. 
   $stmt = $this->conn->prepare("SELECT * FROM tbl_users WHERE userName=:userN");
   //you can execute by binding params to v's that are passed in, or you can use an array which uses placeholders.
   $stmt->execute(array(":userN"=>$uN));
   //userRow is the result of the stmt, it needs to be fetched. 
   $userRow=$stmt->fetch(PDO::FETCH_ASSOC);
   
   if($stmt->rowCount() == 1)
   {
    if($userRow['userStatus']=="Y")
    {
     if($userRow['userPass']==md5($upass))
     {
      $_SESSION['userSession'] = $userRow['userID'];
	  $_SESSION['guest'] = false;
	  //if the user info is all correct...
      return true;
     }
     else
     {
      header("Location: index.php?error"); //error with pass!
      exit;
     }
    }
    else
    {
     header("Location: index.php?inactive");//the user has not activated their acct!
     exit;
    } 
   }
   else
   {
    header("Location: index.php?error");//error with too many registered accts under this email
    exit;
   }  
  }
  catch(PDOException $ex)
  {
   echo $ex->getMessage();
  }
 }
 
 //checks if the userSession already exists (they're logged in already.)
 public function is_logged_in()
 {
  if(isset($_SESSION['userSession']))
  {
   return true;
  }
 }
 
 //used to redirect users when needed, pass a url.
 public function redirect($url)
 {
  header("Location: $url");
 }
 
 //logs the user out by destroying the session
 public function logout()
 {
  session_destroy();
  $_SESSION['userSession'] = false;
 }
  public function checkGuest() {
		 return false;
 }

  function send_mail($email,$message,$subject) {

	require("class.phpmailer.php");
	require("class.smtp.php");
	
	set_time_limit(120); // set the time limit to 120 seconds
	
	$mail = new PHPMailer();
	
	$mail->IsSMTP();                                      // set mailer to use SMTP
	$mail->Host = "localhost";  // specify main and backup server
	$mail->SMTPAuth = true;     // turn on SMTP authentication
	$mail->Username = "raluke@pinonsustainability.com";  // SMTP username
	$mail->Password = "Dcsd117759"; // SMTP password
	$mail->Port = 587; 
	$mail->Timeout       =   60; // set the timeout (seconds)
        $mail->SMTPKeepAlive = true; // don't close the connection between messages
	$mail->From = "raluke@pinonsustainability.com";
	$mail->FromName = "RA Luke";
	$mail->AddAddress($email);
	$mail->AddReplyTo("ewanlp@gmail.com", "Luke's personal email");
	$mail->Body    = $message;
	$mail->WordWrap = 50;                                 // set word wrap to 50 characters
	$mail->IsHTML(true);                                  // set email format to HTML
	
	$mail->Subject = $subject;
	
	if(!$mail->Send())
	{

	}
	$mail->SmtpClose(); // close the connection since it was left open.
}
	
	
}
