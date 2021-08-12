<?php 
$username = "root";
$server = "localhost";
$password = "";
$db_name = "user_module";

$con = mysqli_connect($server,$username,$password,$db_name);
if($con){
  //  echo "connection established";
}
else{
  //  echo "Connection Error";
}

?>