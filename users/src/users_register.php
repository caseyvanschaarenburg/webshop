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
    if(isset($_POST['field_email']) && trim($_POST['field_email']) !== "") {
        $email = $_POST['field_email'];
    }
    else {
        $errors[] = "Please give a email";
    }
    if(isset($_POST['field_password']) && trim($_POST['field_password']) !== "") {
        $pass = $_POST['field_password'];
        $hashed = password_hash($pass, PASSWORD_BCRYPT);
    }
    else {
        $errors[] = "Please give a password";
    }

    $admin = 0;


    if($errors){
        echo $errors;
    }
    //receive data in database
    else{
        $query1 = $con->prepare('INSERT INTO user_account (email,password,admin) VALUES (?,?,?);');
        if ($query1 === false) {
            echo mysqli_error($con) . " - ";
            exit(__LINE__);
        }
        $query1->bind_param('sss', $email,$hashed, $admin);
        if ($query1->execute() === false) {
            echo mysqli_error($con) . " - ";
            exit(__LINE__);
        } else {
            header('location: ../view/users_login_view.php');
            $query1->close();
        }
    }
}


?>