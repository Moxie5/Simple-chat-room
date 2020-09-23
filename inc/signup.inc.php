<?php
ini_set('display_errors', 'On');
require_once '../inc/db.inc.php';
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);
    $rpwd = mysqli_real_escape_string($conn, $_POST['repassword']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    $sql = "SELECT * FROM users WHERE username='$username' OR email='$email' ";
    $res = $conn->query($sql);
    // print_r($res);
    if ($res->num_rows > 0) {
        $row = $res->fetch_assoc();
        //Check if user exists
        if ($username == $row['username']) {
            echo "The username ".$username." already exists";
            exit;
        }else if ($email == $row['email']) { //Check if email exists
                echo "The email ".$email.' already exists';
                exit;
            }
    }else { 
        echo "Registration is disabled.";
        exit;
        //If username and email doesn't exists Hash password and insert data into DataBase
        // $hashpwd = password_hash($pwd, PASSWORD_DEFAULT);
        // $sql = "INSERT INTO users(email, username, password) VALUES ('$email', '$username', '$hashpwd')";
        // $query = $conn->query($sql);
        // if ($query) {
        //     echo 'Successfully registered, you can login.';
        //     exit;
        // }else{
        //     echo 'Registration failed';
        //     exit();
        // } 
    }
    mysqli_close($conn);