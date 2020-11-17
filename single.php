<?php
require_once "config/connect.php";
session_start();
if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'name' => $_POST["hidden_name"],
                'price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo "AAAAAAAAH";
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'name' => $_POST["hidden_name"],
            'price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}
$id = $_GET['id'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Product</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="Colo Shop Template">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap4/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
<link rel="stylesheet" href="plugins/themify-icons/themify-icons.css">
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


	<div class="container single_product_container">
		<div class="row">
			<div class="col">

				<!-- Breadcrumbs -->


			</div>
		</div>
        <?php
        $sql = "SELECT * FROM producten WHERE id='$id'";
        $result = $con->query($sql);
        while ($row = $result->fetch_assoc()) {
        $img = $con->query("SELECT image FROM product_foto WHERE product_id='$id'")->fetch_assoc()["image"];
        ?>
        <form method="post" action="shop.php?action=add&id=<?php echo $row["id"]; ?>">
		<div class="row">
			<div class="col-lg-7">
				<div class="single_product_pics">
					<div class="row">
						<div class="col-lg-3 thumbnails_col order-lg-1 order-2">
							<div class="single_product_thumbnails">
								<ul>
									<li><img src="cms/products/uploads/<?= $img; ?>" alt="" data-image="cms/products/uploads/<?= $img; ?>"></li>
									<li class="active"><img src="cms/products/uploads/<?= $img; ?>" alt="" data-image="cms/products/uploads/<?= $img; ?>"></li>
									<li><img src="cms/products/uploads/<?= $img; ?>" alt="" data-image="cms/products/uploads/<?= $img; ?>"></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-9 image_col order-lg-2 order-1">
							<div class="single_product_image">
								<div class="single_product_image_background" style="background-image:url(cms/products/uploads/<?= $img; ?>)"></div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-5">
				<div class="product_details">
					<div class="product_details_title">
						<h2><?= $row['name']; ?></h2>
						<p><?= $row['description']; ?></p>
                        <hr>
                        <p>color: <?= $row['color']; ?><br>
                            weight: <?= $row['weight']; ?> kilogram</p>
					</div>
                    <div class="free_delivery d-flex flex-row align-items-center justify-content-center">
                        <span class="ti-truck"></span><span><input type="submit" name="add_to_cart" value="add to cart"></span>
                    </div>
					<div class="product_price">$<?= $row['price']; ?></div>
                    <input type="hidden" name="hidden_name" value="<?= $row['name']; ?>">
                    <input type="hidden" name="hidden_price" value="<?= $row['price']; ?>">
					<div class="quantity d-flex flex-column flex-sm-row align-items-sm-center">
						<span>Quantity:</span>
						<div class="quantity_selector" name="quantity">
                            <input type="text" name="quantity" class="form-control" value="1" >
						</div>
						<div class="product_favorite d-flex flex-column align-items-center justify-content-center"></div>
					</div>
				</div>
			</div>
		</div>
        </form>
        <?php } ?>

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
				<form action="post">
					<div class="newsletter_form d-flex flex-md-row flex-column flex-xs-column align-items-center justify-content-lg-end justify-content-center">
						<input id="newsletter_email" type="email" placeholder="Your email" required="required" data-error="Valid email is required.">
						<button id="newsletter_submit" type="submit" class="newsletter_submit_btn trans_300" value="Submit">subscribe</button>
					</div>
				</form>
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
<script src="assets/js/single_custom.js"></script>
</body>

</html>
