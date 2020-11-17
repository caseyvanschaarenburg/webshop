<?php
session_start();
require '../config/connect.php';
if (isset($_SESSION['username'])== true) {
        header("Refresh:0");
    } else {
    header("Location: ../index2.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//netdna.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <title>welkom</title>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
            <div class="card card-signin my-5">
                <div class="card-body">
                    <h5 class="card-title text-center"><?php echo 'welcome ' . $_SESSION['username']; ?></h5>
                        <button class="btn btn-lg btn-primary btn-block text-uppercase" onclick="window.location.href = 'logout.php'">Log out</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
