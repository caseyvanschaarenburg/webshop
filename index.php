<?php
require_once "config/connect.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Colo Shop Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="plugins/jquery-ui-1.12.1.custom/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main_styles.css">
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
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
                            <a href="index.php">Scammable</a>
                        </div>
                        <nav class="navbar">
                            <ul class="navbar_menu">
                                <li><a href="index.php">home</a></li>
                                <li><a href="shop.php">shop</a></li>
                                <li><a href="under construction/error.php">contact</a></li>
                            </ul>
                            <li class="account">
                                <a href="#">
                                    MY ACCOUNT
                                    <i class="fa fa-angle-down"></i>
                                </a>
                                <ul class="account_selection">
                                    <li><a href="users/view/users_login_view.php"><i class="fa fa-sign-in" aria-hidden="true"></i>Sign In</a></li>
                                    <li><a href="users/view/users_register_view.php"><i class="fa fa-user-plus" aria-hidden="true"></i>Register</a></li>
                                </ul>
                            </li>
                            <ul class="navbar_user">
                                <li><a href="under construction/error.php"><i class="fa fa-search" aria-hidden="true"></i></a></li>
                                <li class="checkout">
                                    <?php
                                    if(isset($_SESSION['shopping_cart'])){
                                        $count = count($_SESSION['shopping_cart']);
                                        echo "<a href=\"shoppingcart.php\">
                                        <i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"><br>$count</i>
                                    </a>";
                                    } else
                                        echo "<a href=\"shoppingcart.php\">
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

    </header>

	<!-- Slider -->

	<div class="main_slider" style="background-image:url(assets/img/indexbanner.jpg)">
		<div class="container fill_height">
			<div class="row align-items-center fill_height">
				<div class="col">
					<div class="main_slider_content">
						<h6>Spring / Summer Collection 2020</h6>
						<h1>Get scammed!</h1>
						<div class="red_button shop_now_button"><a href="shop.php">shop now</a></div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<hr>

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

<script src="assets/js/jquery-3.2.1.min.js"></script>
<script src="assets/css/bootstrap4/popper.js"></script>
<script src="assets/css/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="assets/js/custom.js"></script>
</body>

</html>
