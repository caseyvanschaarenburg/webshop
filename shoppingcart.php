<?php
require_once "configg/connect.php";
session_start();
if(isset($_GET["action"]))
{
    if($_GET["action"] == "delete")
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
            if($values["item_id"] == $_GET["id"])
            {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
            }
        }
    }
}
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
                        <a href="index.php"><img src="assets/img/logo.png" alt="Hotpink" height="45px"></a>
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


    <div class="container product_section_container">

        <!-- Breadcrumbs -->

        <div class="breadcrumbs d-flex flex-row align-items-center">
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </div>

        <!-- Sidebar -->

        <div class="sidebar">
            <div class="sidebar_section">
                <div class="sidebar_title">
                    <h5>Check out</h5>
                </div>
                <ul class="sidebar_categories">
                    <li><a href="#">scam</a></li>
                </ul>
            </div>


        </div>


        <!-- Main Content -->

        <div class="main_content">


            <!-- Products -->
            <div class="table-responsive2">
                <table class="table table-bordered">
                    <tr>
                        <th width="40%">Item Name</th>
                        <th width="10%">Quantity</th>
                        <th width="20%">Price</th>
                        <th width="15%">Total</th>
                        <th width="5%">Action</th>
                    </tr>
                    <?php

                    if(!empty($_SESSION["shopping_cart"]))
                    {
                        $total = 0;
                        foreach ($_SESSION["shopping_cart"] as $keys => $values)
                        {
                            ?>
                            <tr>
                                <td><?php echo $values ["name"] ?></td>
                                <td><?php echo $values["item_quantity"] ?></td>
                                <td>$ <?php echo $values["price"] ?></td>
                                <td>$ <?php echo number_format($values["item_quantity"] * $values["price"], 2); ?></td>
                                <td><a href="shoppingcart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
                            </tr>
                            <?php
                            $total = $total + ($values["item_quantity"] * $values["price"]);
                        }
                        ?>
                        <tr>
                            <td colspan="3" align="right">Total</td>
                            <td align="right">$ <?php echo number_format($total, 2); ?></td>
                            <td><a href="users/view/checkout_usernouser.php?action?id=<?php echo $values["item_id"]; ?>"><button class="text-success">check-out</button></a></td>
                        </tr>
                        <?php
                    }
                    ?>
                </table>
            </div>
        </div>

        <!-- Product Grid -->

    </div>
</div>
<!-- Benefit -->

<div class="benefit">
    <div class="container">
        <div class="row benefit_row">
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-truck" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>free shipping</h6>
                        <p>(Maybe not)</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-money" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>Always late delivery</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-undo" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>NO return</h6>
                        <p>Making it Look Like a scam</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 benefit_col">
                <div class="benefit_item d-flex flex-row align-items-center">
                    <div class="benefit_icon"><i class="fa fa-clock-o" aria-hidden="true"></i></div>
                    <div class="benefit_content">
                        <h6>24/7</h6>
                        <p>Always open!</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Newsletter -->

<div class="newsletter">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="newsletter_text d-flex flex-column justify-content-center align-items-lg-start align-items-md-center text-center">
                    <h4>Newsletter</h4>
                    <p>Subscribe to our newsletter and get a scam!</p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
                    <input id="newsletter_email" type="email" placeholder="Your email" required="required"
                           data-error="Valid email is required.">
                    <button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">
                        subscribe
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Footer -->

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="footer_nav_container d-flex flex-sm-row flex-column align-items-center justify-content-lg-start justify-content-center text-center">
                    <ul class="footer_nav">
                        <li><a href="under construction/contact.html">Contact us</a></li>
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
<script src="plugins/jquery-ui-1.12.1.custom/jquery-ui.js"></script>
<script src="assets/js/categories_custom.js"></script>
</body>

</html>
