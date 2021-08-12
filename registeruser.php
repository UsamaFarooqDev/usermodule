<?php 
@include('connection.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="css/app.css">
    <title>Welcome To Zech Technologies</title>
  </head>
  <body>
    <div class="container-fluid">
        <div class="row header text-center align-items-center">
            <div class="col-sm-12">
                <h1>Welcome To Zech Technologies</h1>
            </div>
        </div>
    </div>
    <div class="container-fluid body">
        <div class="row text-center ">
            <div class="offset-sm-4 col-sm-4 offset-sm-4">
               
                  
              
                <form action="php/register.php" method="post" class="forms">
                <?php
                    if(isset($_SESSION['error'])){

                        echo $_SESSION['error'];
                       
                        // session_unset();
                        // session_destroy();
                    }
                    ?>
                    <h1>Register Now:</h1>
                    <label for=""><b>Full Name:</b></label>
                    <input type="text" name="fname" id="" class="form-control" placeholder="Full Name">
                    <label for=""><b>Email:</b></label>
                    <input type="email" name="email" id="" class="form-control" placeholder="Email">
                    <label for=""><b>Password:</b></label>
                    <input type="password" name="pass" id="" class="form-control" placeholder="********">
                    <br>
                    <input type="submit" name="register_user" value="Register" class="btn btn-success" >
<br>
                    <a href="index.php" class="mt-3">Already Have an Account? Login</a>
                </form>
            </div>
        </div>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
  </body>
</html>