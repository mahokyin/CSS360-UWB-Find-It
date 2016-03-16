<?php
require_once 'DB_Connect.php';
$db = new DB_Connect();
$db->connect();

ob_start();

mysql_select_db("$db_name")or die("cannot select DB");

// Define $myusername and $mypassword 
$username = $_POST['username']; 
$password = $_POST['password']; 

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$sql = "SELECT * FROM user WHERE username ='$username' and password ='$password'";
$result = mysql_query($sql);

// Mysql_num_row is counting table row
$count=mysql_num_rows($result);

// If result matched $myusername and $mypassword, table row must be 1 row
if($count==1){

// Register $myusername, $mypassword and redirect to file "login_success.php"
session_register("username");
session_register("password"); 
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
ob_end_flush();

?>