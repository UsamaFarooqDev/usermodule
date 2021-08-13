<?php
@include('php/connection.php');

session_start();
if (!isset($_SESSION['useremail'])) {
    header("refresh:0.1 url=index.php");
} elseif (isset($_SESSION['useremail'])) {
    $email = $_SESSION['useremail'];
    $sql = "SELECT * FROM user_db where Email = '$email'";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);
}
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="css/app.css">
    <title>Welcome To Zech Technologies</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row header text-center align-items-center">
            <div class="col-sm-8">
                <h1>Welcome To Zech Technologies</h1>
            </div>
            <div class="col-sm-4">
                <i class="fa fa-sign-out-alt fa-1x"> <a href="index.php">Logout </a></i>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row text-center">
            <div class="col-sm-12">
                <div class="row user_details">
                    <div class="col-sm-4">
                        <h4><?php echo $row['FullName']; ?></h4>
                    </div>
                    <div class="col-sm-4">
                        <h5><?php echo $email; ?></h5>
                    </div>
                    <div class="col-sm-4">
                        <input type="submit" value="Edit Profile" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#profileedit">
                    </div>
                </div>
                <div class="row">
                    <div class="modal fade" id="profileedit" tabindex="-1" aria-labelledby="profileedit" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profileedit">Update Profile:</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="php/update.php" method="post">
                                        <label for="">Email:</label>
                                        <input type="hidden" name="oldemail" value="<?php echo $email; ?>">
                                        <input type="email" name="useremail" class="form-control" placeholder="Email" id="" value="<?php echo $email; ?>"> <br>
                                        <input type="password" name="userpass" class="form-control" placeholder="********" id="hi_field"> <br>
                                        <input type="submit" value="Update" name="user_update" class="btn btn-success" id="u_btn"> <br>
                                        <a onclick="show_hifields()" href="javascript:void(0)" class="btn btn-info" id="c_btn"> Continue </a>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-5" id="search">
                    <div class="col-sm-6 ">
                        <h3>Search Here</h3>
                    </div>
                    <div class="col-sm-4">
                        <input type="text" name="search" id="input" onkeyup="search()" class="form-control" placeholder="Search......">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-striped" id="data">
                            <thead>
                                <tr>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $bulk = "select * from user_db";
                                $result_bulk = mysqli_query($con, $bulk);
                                while ($row_bulk = mysqli_fetch_array($result_bulk)) {
                                ?>
                                    <tr>
                                        <td><?php echo $row_bulk['FullName']; ?></td>
                                        <td><?php echo $row_bulk['Email']; ?></td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/app.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
</body>

</html>