<?php
session_start();
if(isset($_POST['login'])) {

    if (isset($_POST['username']) && trim($_POST['username']) !== "") {
        $email = $_POST['username'];
    } else {
        echo $errors[] = "Please give a email";
    }
    if (isset($_POST['password']) && trim($_POST['password']) !== "") {
        $pass = $_POST['password'];
    } else {
        echo $errors[] = "Please give a password";
    }

    $result_users = $con->query('SELECT * FROM user_account WHERE email="' . $email . '" AND admin=0');
    if (mysqli_num_rows($result_users) == 1) {
        //user
        while ($user = $result_users->fetch_assoc()) {
            if (password_verify($pass, $user['password'])) {
                $_SESSION['username'] = $email;
                header('Location: ../../shop.php');
            } else {
                //wachtwoord klopt niet
                echo "Password was incorrect";
            }
        }
    } else {
        //admin hier
        $result_staff = $con->query('SELECT * FROM user_account WHERE email="' . $email . '" AND admin=1');
        if (mysqli_num_rows($result_staff) == 1) {
            while ($user = $result_staff->fetch_assoc()) {
                if (password_verify($pass, $user['password'])) {
                    $_SESSION['username'] = $email;
                    header('Location: ../../cms/products/products_cms.php');
                } else {
                    //wachtwoord klopt niet
                    echo "password was incorrect";
                }
            }
        }
    }
}
?>