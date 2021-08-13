<?php 
@include('connection.php');

if(isset($_POST['user_update'])){
    $email = $_POST['useremail'];
    $pass = $_POST['userpass'];
    $oldemail = $_POST['oldemail'];
    

    //validate user 

    $check_val = "Select * from user_db where Email = '$oldemail'";
    $result = mysqli_query($con , $check_val);
    $row = mysqli_fetch_array($result);
    $hashpass = $row['Pass'];
    $verifypass = password_verify($pass, $hashpass);
    if($verifypass){
        $update = "Update user_db Set Email = '$email' 
        where Pass = '$hashpass'";
        mysqli_query($con,$update);
        session_start();
        $_SESSION['useremail'] = $email;
        header("refresh:0.1 url=../dashboard.php");
    }
    else{
        echo "<script type='text/javascript'>alert('Wrong Password');</script>";
        header("refresh:0.1 url=../dashboard.php");
    }
}
