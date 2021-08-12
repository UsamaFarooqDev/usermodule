<?php
@include('connection.php');
$email = $_POST['email'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM user_db";
$result =  mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);

//validate now

if($email == $row['Email'] && $pass == $row['Pass']){
    session_start();
    $_SESSION['useremail'] = $row['Email'];
    header("refresh:0.1 url=../dashboard.php");
}
else if($email != $row['Email']){
    echo "<script type='text/javascript'>alert('Invalid Email');</script>";
        header("refresh:0.1 url=../index.php");
}
else if ($pass != $row['Pass']){
    echo "<script type='text/javascript'>alert('Invalid Password');</script>";
        header("refresh:0.1 url=../index.php");
}

?>