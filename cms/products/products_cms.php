<?php
require '../../config/connect.php';
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
                    <h2>Manage <a style="color: white">Products</a> | <a href="../costumers/costumers_cms.php" style="color: #0397d6">Costumers</a></h2>
                </div>
                <div class="col-sm-6">
                    <button type="submit" name="logout" class="btn btn-danger"><i class="material-icons" onclick="window.location.href = 'logout.php'">&#xE15C;</i>log out</button>
                    <a href="#add" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i>
                        <span>Add product</span></a>
                </div>
            </div>
        </div>


        <!--QUERY'S FOR CRUD-->
        <?php
        if (isset($_GET['upd'])) {
            $id = $_GET['upd'];
            $query = "SELECT * FROM producten WHERE id=$id";
            $result = mysqli_query($con, $query);
            $user = mysqli_fetch_assoc($result);
            mysqli_free_result($result);
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            //DELETE PRODUCT
            if (isset($_POST['delete'])) {
                $query = "DELETE FROM producten WHERE id={$_POST['delete']}";
                if ($con->query($query) === TRUE) {
                    echo '<div class="alert alert-success"> The product was succesfully deleted </div>';;
                } else {
                    echo '<div class="alert alert-danger">An error occured while deleting the product</div>' . $con->error;
                }

            }

            //UPDATE PRODUCT
            if (isset($_POST['btnupdate'])) {
                $name = $_POST['name'];
                $description = $_POST['description'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $color = $_POST['color'];
                $weight = $_POST['weight'];
                $active = $_POST['active'];
                $imgUpdate = $_POST['img'];

                $sql = "UPDATE producten SET `name`='$name', description='$description', category_id='$category', price='$price', color='$color', weight='$weight', active='$active' WHERE id={$_POST['btnupdate']}";
                if ($con->query($sql) === TRUE) {
                    echo '<div class="alert alert-success"> The product has been succesfully updated </div>';
                } else {
                    var_dump($sql);
                    echo '<div class="alert alert-danger"> An error occured while updating the product </div>';
                }
            }

            //ADD PRODUCTS
            if (isset($_POST['add']) && isset($_FILES["image"])) {

                global $id;

                $name = $_POST['name'];
                $description = $_POST['description'];
                $category = $_POST['category'];
                $price = $_POST['price'];
                $color = $_POST['color'];
                $weight = $_POST['weight'];
                $active = $_POST['active'];
                $img = $_FILES['image']['name'];


                $sql = "INSERT INTO producten (`name`, description, category_id, price, color, weight, active)
                        VALUES ('$name', '$description','$category','$price', '$color','$weight','$active')";


                $countOkQuery = 0;

                if ($con->query($sql) === TRUE) {
                    $countOkQuery++;
                } else {
                    $countOkQuery--;
                }

                //specify where the file is being placed
                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES['image']["name"]);
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
                // Check if image file is a actual image or fake image
                $check = getimagesize($_FILES['image']["tmp_name"]);
                if ($check !== false) {
                    $uploadOk = 1;
                } else {
                    echo "File is not an image.";
                    $uploadOk = 0;
                }
                // Check if file already exists
                if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                }
                // Check file size
                if ($_FILES['image']["size"] > 500000) {
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                }
                // Allow certain file formats
                if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif") {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                }
                // Check if $uploadOk is set to 0 by an error
                if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                } else {
                    if(move_uploaded_file($_FILES['image']['tmp_name'],$target_dir.$name)) {
                            $imgsql = "INSERT INTO product_foto (product_id, image, active) VALUES (LAST_INSERT_ID(),'$target_dir.$name','1')";
                            if ($con->query($imgsql) === true) {
                                $countOkQuery++;
                            } else {
                                $countOkQuery--;

                            }
                        } else {
                            echo "Sorry, there was an error uploading your file.";
                        }

                }
                if ($countOkQuery == 2) {
                    echo '<div class="alert alert-success"> The product was succefully added </div>';
                } else {
                    echo '<div class="alert alert-danger"> An error occured while adding the product </div>';
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
                <th>Name</th>
                <th>Description</th>
                <th>Category id</th>
                <th>Price</th>
                <th>Color</th>
                <th>Weight in grams</th>
                <th>Active</th>
            </tr>
            </thead>
            <?php

            //SEARCH FOR PRODUCT AND GET ALL PRODUCTS
            if (isset($_POST['search'])) {
                $searchKey = $_POST['search'];
                $sql = "SELECT * FROM producten WHERE `name` LIKE '%$searchKey%'";
            } else
                $sql = "SELECT * FROM producten";
            $result = $con->query($sql);
            while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            $imgquery = $con->query("SELECT * FROM producten INNER JOIN product_foto ON product_foto.product_id=producten.id")->fetch_assoc()["image"];
            ?>
            <tbody>
            <tr>
                <td><?= $row['name']; ?></td>
                <td><?= $row['description']; ?></td>
                <td><?= $row['category_id']; ?></td>
                <td>€<?= $row['price']; ?></td>
                <td><?= $row['color']; ?></td>
                <td><?= $row['weight']; ?></td>
                <td><?= $row['active']; ?></td>
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
                            <h5 class="modal-title" id="exampleModalLabel">Edit product</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form method="post">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input value='<?php echo $row["name"] ?>' name="name" type="text"
                                           class="form-control"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <input value='<?php echo $row["description"] ?>' name="description" type="text"
                                           class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Category</label>
                                    <input value='<?php echo $row["category_id"] ?>' name="category"
                                           class="form-control"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Price</label>
                                    <input value='<?php echo $row["price"] ?>' name="price" type="text"
                                           class="form-control"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Color</label>
                                    <input value='<?php echo $row["color"] ?>' name="color" type="text"
                                           class="form-control"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Weight in grams</label>
                                    <input value='<?php echo $row["weight"] ?>' name="weight" type="text"
                                           class="form-control"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Active</label>
                                    <input value='<?php echo $row["active"] ?>' name="active" type="text"
                                           class="form-control"
                                           required>
                                </div>
                                <div class="form-group">
                                    <label>Image</label>
                                    <input value='<?php echo $imgquery  ?>' name="img" type="text"
                                           class="form-control"
                                           required>
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
    <!-- ADD PRODUCT MODAL -->
    <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Name</label>
                            <input value='' name="name" type="text" class="form-control"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input value='' name="description" type="text"
                                   class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <input value='' name="category" class="form-control"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input value='' name="price" type="text" class="form-control"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Color</label>
                            <input value='' name="color" type="text" class="form-control"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Weight in grams</label>
                            <input value='' name="weight" type="text" class="form-control"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Active</label>
                            <input value='' name="active" type="text" class="form-control"
                                   required>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type="file" name="image" class="form-control" id="image" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <div class="form-group">
                            <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                            <?php
                            echo '<button type="submit" class="btn btn-success" name="add" >Save</button>'
                            ?>
                        </div>
                </form>
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
