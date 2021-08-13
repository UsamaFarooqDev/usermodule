<?php
@include('connection.php');
$email = $_POST['email'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM user_db where Email = '$email'";
$result =  mysqli_query($con,$sql);
$row = mysqli_fetch_array($result);
$verifypass = password_verify($pass, $row['Pass']);

//validate now

if ($email == $row['Email'] && $verifypass) {
    session_start();
    $_SESSION['useremail'] = $row['Email'];
    header("refresh:0.1 url=../dashboard.php");
}elseif ($email != $row['Email']) {
    echo "<script type='text/javascript'>alert('Invalid Email');</script>";
        header("refresh:0.1 url=../index.php");
}elseif (!$verifypass) {
    echo "<script type='text/javascript'>alert('Invalid Password');</script>";
        header("refresh:0.1 url=../index.php");
}
