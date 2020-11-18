<?php
include("../../configg/connect.php");
include("../src/users_register.php");

//dd($_POST);

if (!empty($_POST)) {
    $sfd = setFormData();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Single Product</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../../assets/css/bootstrap4/bootstrap.min.css">
    <link href="../../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" href="../../plugins/themify-icons/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="../../plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/main_styles.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/responsive.css">
</head>

<body>

<div class="super_container">

    <!-- Header -->

    <header class="header trans_300">


        <!-- Main Navigation -->

        <div class="main_nav_container">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-right">
                        <div class="logo_container">
                        <a href="index.php"><img src="../../assets/img/logo.png" alt="Hotpink" height="45px"></a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="../../index.php">home</a></li>
                                <li><a href="../../shop.php">shop</a></li>
                                <li><a href="../../under construction/error.php">contact</a></li>
                            </ul>
                            <li class="account">
                                <a href="#">
                                    MY ACCOUNT
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="account_selection">
                                    <li><a href="../../users/view/users_login_view.php"><i class="fa fa-sign-in"
                                                                                           aria-hidden="true"></i>Sign
                                            In</a></li>
                                    <li><a href="../../users/view/users_register_view.php"><i class="fa fa-user-plus"
                                                                                              aria-hidden="true"></i>Register</a>
                                    </li>
                                </ul>
                            </li>
                            <ul class="navbar_user">
                                <li><a href="../../under construction/error.php"><i class="fa fa-search"
                                                                                    aria-hidden="true"></i></a></li>
                                <li class="checkout">
                                    <?php
                                    if (isset($_SESSION['shopping_cart'])) {
                                        $count = count($_SESSION['shopping_cart']);
                                        echo "<a href=\"shoppingcart.php\">
                                        <i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"><br>$count</i>
                                    </a>";
                                    } else
                                        echo "<a href=\"../../shoppingcart.php\">
                                        <i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"><br>0</i>
                                    </a>"
                                    ?>
                                </li>
                            </ul>
                            <div class="hamburger_container">
                                <i class="fa fa-bars" aria-hidden="true"></i>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </header><br><br><br><br><br><br>
    <div class="container">
        <div class="row">
            <div class="col-sm-9 col-md-7 col-lg-5 mx-auto">
                <div class="card card-signin my-5">
                    <div class="card-body">
                        <h5 class="card-title text-center">Sign Up!</h5>
                        <form class="form-signin" method="post">
                            <div class="form-label-group">
                                <input type="text" name="field_firstname" id="inputName" class="form-control" placeholder="Voornaam">
                                <label for="inputName"></label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" name="field_infixname" id="inputInfix" class="form-control" placeholder="Tussenvoegsel">
                                <label for="inputInfix"></label>
                            </div>
                            <div class="form-label-group">
                                <input type="text" name="field_lastname" id="inputLastname" class="form-control" placeholder="Achternaam" required>
                                <label for="inputLastname"></label>
                            </div>
                            <hr class="my-4">
                            <div class="form-label-group">
                                <input type="text" name="field_email" id="inputEmail" class="form-control" placeholder="E-mail" required>
                                <label for="inputEmail"></label>
                            </div>
                            <div class="form-label-group">
                                <input type="password" name="field_password" id="inputPassword" class="form-control" placeholder="Wachtwoord">
                                <label for="inputPassword"></label>
                            </div>
                            <button class="btn btn-lg btn-primary btn-block text-uppercase" type="submit">Sign Up</button>
                            <hr class="my-4">
                            <p class="mb0 text-center">Already have an account?
                                <a href="users_login_view.php" class="btn btn-underline">Sign In</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <hr>


    <div style="margin-left: 40%"><img alt="mastercard" width="48" height="32"
                                       data-testid="paymentMethod"
                                       src="https://mosaic02.ztat.net/lny/reef/images/f41333fcfc584bfc93f36260570a6108.svg"><img
                alt="visa" width="48" height="32" class="lny_1xsg3" data-testid="paymentMethod"
                src="https://mosaic02.ztat.net/lny/reef/images/9d918cc4a4f6908da0db0b137820a742.svg"><img
                alt="amex" width="48" height="32" class="lny_1xsg3" data-testid="paymentMethod"
                src="https://mosaic02.ztat.net/lny/reef/images/d021b54d4e42215d8c2008bcd25894c6.svg"><img
                alt="paypal" width="48" height="32" class="lny_1xsg3" data-testid="paymentMethod"
                src="https://mosaic02.ztat.net/lny/reef/images/06096fd835ca9a399664bc09bc1f9fa5.svg"><img
                alt="rekening" width="48" height="32" class="lny_1xsg3" data-testid="paymentMethod"
                src="https://mosaic02.ztat.net/lny/reef/images/4e141bed6c4a1174fc2a9dc2690ade21.svg"><img
                alt="ideal" width="48" height="32" class="lny_1xsg3" data-testid="paymentMethod"
                src="https://mosaic02.ztat.net/lny/reef/images/5dcbceb6274c789de743aa29d7e5aa25.svg">
    </div>


    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                        <ul class="footer_nav">
                            <li><a href="under construction/error.php">Contact us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="footer_social d-flex flex-row align-items-center justify-content-lg-end justify-content-center">
                        <ul>
                            <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-skype" aria-hidden="true"></i></a></li>
                            <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </footer>


</div>

<script src="../../assets/js/jquery-3.2.1.min.js"></script>
<script src="../../assets/css/bootstrap4/popper.js"></script>
<script src="../../assets/css/bootstrap4/bootstrap.min.js"></script>
<script src="../../plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="../../plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="../../plugins/easing/easing.js"></script>
<script src="../../plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="../../assets/js/single_custom.js"></script>
</body>

</html>
