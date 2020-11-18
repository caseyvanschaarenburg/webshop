<?php
require '../../configg/connect.php';
session_start();
if (isset($_SESSION['username']) == true) {

} else {
    header("Location: ../../index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/product_crud.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>


<body>


<!-- NAVIGATION -->
<div class="container">
    <div class="table-wrapper">
        <div class="table-title">
            <div class="row">
                <div class="col-sm-6">
                    <h2>Manage <a style="color: white" href="../products/products_cms.php">Products</a> | <a href="costumers_cms.php" style="color: #0397d6">Costumers</a></h2>
                </div>
                <div class="col-sm-6">
                    <button type="submit" name="logout" class="btn btn-danger"><i class="material-icons" onclick="window.location.href = '../products/logout.php'">&#xE15C;</i>log out</button>
                </div>
            </div>
        </div>


        <!--QUERY'S FOR CRUD-->
        <?php
        if (isset($_GET['upd'])) {
            $id = $_GET['upd'];
            $query = "SELECT * FROM costumer WHERE id=$id";
            $result = mysqli_query($con, $query);
            $user = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //DELETE PRODUCT
            if (isset($_POST['delete'])) {
                $query = "DELETE FROM costumer WHERE id={$_POST['delete']}";
                if ($con->query($query) === TRUE) {
                    echo '<div class="alert alert-success"> The product was succesfully deleted </div>';;
                } else {
                    echo '<div class="alert alert-danger">An error occured while deleting the product</div>' . $con->error;
                }

            }

            //UPDATE PRODUCT
            if (isset($_POST['btnupdate'])) {
                $gender = $_POST['gender'];
                $first_name = $_POST['firstn'];
                $middle_name = $_POST['middlen'];
                $last_name = $_POST['lastn'];
                $street = $_POST['street'];
                $house_number = $_POST['house_number'];
                $addon = $_POST['addon'];
                $city = $_POST['city'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $subscription = $_POST['sub'];

                $sql = "UPDATE costumer 
                        SET gender='$gender', first_name='$first_name', middle_name='$middle_name', last_name='$last_name', street='$street',
                        house_number='$house_number',house_number_addon='$addon',city='$city',phone='$phone',
                        email='$email',newsletter_subsription='$subscription' WHERE id={$_POST['btnupdate']}";

                if ($con->query($sql) === TRUE) {
                    echo '<div class="alert alert-success">Costumer information has been succesfully updated.</div>';
                } else {
                    echo '<div class="alert alert-danger"> An error occured while updating costumer information. </div>';
                }
            }
        }


        ?>


        <!-- SEARCH BAR -->
        <form class="form-inline" method="post" style="float: right">
            <input class="form-control mr-sm-2" name="search" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>


        <!-- OVERVIEW PRODUCTS -->
        <table class="table table-striped table-hover">
            <thead>
            <tr>
                <th>name</th>
                <th>streetname</th>
                <th>house number</th>
                <th>email</th>
            </tr>
            </thead>
            <?php

            //SEARCH FOR PRODUCT AND GET ALL PRODUCTS
            if (isset($_POST['search'])) {
                $searchKey = $_POST['search'];
                $sql = "SELECT * FROM costumer WHERE first_name LIKE '%$searchKey%'";
            } else
                $sql = "SELECT * FROM costumer";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            ?>
            <tbody>
            <tr>
                <td><?= $row['first_name'], '<br>'.$row['middle_name'], '<br>'.$row['last_name']; ?></td>
                <td><?= $row['street']; ?></td>
                <td><?= $row['house_number'];?></td>
                <td><?= $row['email']; ?></td>
                <td>
                    <?php
                    echo '<a href="#edit' . $row['id'] . '"  class="edit" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>';
                    ?>
                    <?php
                    echo '<a href="#delete' . $row['id'] . '"  class="delete" data-toggle="modal"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>';
                    ?>
                </td>
            </tr>

            <!-- UPDATE MODAL -->
            <div class="modal fade" id="edit<?php echo $row['id'] ?>" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit costumer</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Gender</label>
                                    <input value='<?php echo $row["gender"] ?>' name="gender" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>First name</label>
                                    <input value='<?php echo $row["first_name"] ?>' name="firstn" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Middle name</label>
                                    <input value='<?php echo $row["middle_name"] ?>' name="middlen" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Last name</label>
                                    <input value='<?php echo $row["last_name"] ?>' name="lastn" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Street</label>
                                    <input value='<?php echo $row["street"] ?>' name="street" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>House number</label>
                                    <input value='<?php echo $row["house_number"] ?>' name="house_number" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Addon</label>
                                    <input value='<?php echo $row["house_number_addon"] ?>' name="addon" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <input value='<?php echo $row["city"] ?>' name="city" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input value='<?php echo $row["phone"] ?>' name="phone" type="text" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Email</label>
                                    <input value='<?php echo $row["email"] ?>' name="email" type="text" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Subscription</label>
                                    <input value='<?php echo $row["newsletter_subsription"] ?>' name="sub" type="text" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <div class="form-group">
                                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                                    <?php
                                    echo '<button type="submit" class="btn btn-success" name="btnupdate" value="' . $row['id'] . '">Save</button>'
                                    ?>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
    </div>

    <!-- DELETE MODAL -->
    <div class="modal fade" id="delete<?php echo $row['id'] ?>" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">delete product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="modal-body">
                        <p>Are you sure you want to delete these Records?</p>
                        <p class="text-warning"><small>This action cannot be undone.</small></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <form method="post">
                        <div class="form-group">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <?php
                            echo '<button type="submit" class="btn btn-danger" name="delete" value="' . $row['id'] . '">Delete</button>'
                            ?>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    </tbody>
    </table>
</div>
</div>


</body>
</html>
