<?php
@include('connection.php');

if (isset($_POST['register_user'])) {
    $name = $_POST['fname'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    //Select all prevoius data to check duplication
    $check_val = "Select * from user_db";
    $result = mysqli_query($con, $check_val);
    $row_val = mysqli_fetch_array($result);
    // insert into db
    $sql = "INSERT INTO user_db (FullName,Email,Pass)
            VALUES('$name','$email','$hash')";
    if (empty($row_val) && mysqli_query($con, $sql) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script type='text/javascript'>alert('Welcome');</script>";
        header("refresh:0.1 url=../index.php");
    } elseif ($email == $row_val['Email']) {
        echo "<script type='text/javascript'>alert('Email Already Registered');</script>";
        header("refresh:0.1 url=../registeruser.php");
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script type='text/javascript'>alert('Invalid Email');</script>";
        header("refresh:0.1 url=../registeruser.php");
    } elseif (mysqli_query($con, $sql)) {
        header("refresh:0.1 url=../index.php");
    }
}

?>