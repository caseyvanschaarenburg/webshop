<?php
include("../../configg/connect.php");

function setFormData()
{
    global $con,
           $_POST;


    //validate form data
    if(isset($_POST['field_firstname']) && trim($_POST['field_firstname']) !== "") {
        $name = $_POST['field_firstname'];
    }
    else {
        $errors[] = "Please give a name";
    }
    if(isset($_POST['field_infixname']) && trim($_POST['field_infixname']) !== "") {
        $infix = $_POST['field_infixname'];
    }
    else {
        $errors[] = "Please give a name";
    }
    if(isset($_POST['field_lastname']) && trim($_POST['field_lastname']) !== "") {
        $lastname = $_POST['field_lastname'];
    }
    else {
        $errors[] = "Please give a name";
    }
    if(isset($_POST['field_email']) && trim($_POST['field_email']) !== "") {
        $email = $_POST['field_email'];
    }
    else {
        $errors[] = "Please give a email";
    }
    if(isset($_POST['field_postal']) && trim($_POST['field_postal']) !== "") {
        $postal = $_POST['field_postal'];
    }
    else {
        $errors[] = "Please give a password";
    }
    if(isset($_POST['field_housenumber']) && trim($_POST['field_housenumber']) !== "") {
        $housenumber = $_POST['field_housenumber'];
    }
    else {
        $errors[] = "Please give a password";
    }


    if($errors){
        echo $errors;
    }
    //receive data in database
    else{
        $order_date = new DateTime();
        $order_date2 = $order_date->format("Y-m-d H:i:s");

        //Create COSTUMER
        $query1 = $con->prepare('INSERT INTO costumer (first_name,middle_name,last_name,email,street,house_number) VALUES (?,?,?,?,?,?);');
        if ($query1 === false) {
            echo mysqli_error($con) . " - ";
            exit(__LINE__);
        }
        $query1->bind_param('sssssi', $name,$infix, $lastname,$email,$postal,$housenumber);
        if ($query1->execute() === false) {
            echo mysqli_error($con) . " - ";
            exit(__LINE__);
        } else {
//            header('location: ../src/order_success.php');
            $costumer_id = $con->insert_id;
            $query1->close();
        }

        //Create order
        $query2 = $con->prepare('INSERT INTO `order` (order_date,costumer_id) VALUES (?,?);');
        if ($query2 === false) {
            echo mysqli_error($con) . " - ";
            exit(__LINE__);
        }
        $query2->bind_param('si', $order_date2, $costumer_id);
        if ($query2->execute() === false) {
            echo mysqli_error($con) . " - ";
            exit(__LINE__);
        } else {
            $order_id = $con->insert_id;
            $query2->close();
        }

        //Create order_details
        foreach ($_SESSION['shopping_cart'] as $keys => $values) {
            $query2 = $con->prepare('INSERT INTO `order_details` (order_id,product_id, aantal) VALUES (?,?,?);');
            if ($query2 === false) {
                echo mysqli_error($con) . " - ";
                exit(__LINE__);
            }
            $query2->bind_param('iii', $order_id, $values["item_id"], $values["item_quantity"]);
            if ($query2->execute() === false) {
                echo mysqli_error($con) . " - ";
                exit(__LINE__);
            } else {
                $query2->close();
            }
        }
    }

        //Clean shopping cart
}


?>