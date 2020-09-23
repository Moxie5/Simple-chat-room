<?php 
ini_set('display_errors', 'On');
require_once 'db.inc.php';

    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $pwd = mysqli_real_escape_string($conn, $_POST['password']);

    $query = "SELECT * FROM users WHERE email='$username'";
    $res = $conn->query($query);
    $row = $res->fetch_assoc();
    //Decrypting userpassword
    $hashpwd = password_verify($pwd, $row['password']);

    //Check if user exists
    if($res->num_rows == 0) {
        header('Location: ../?error=nouser');
    }else if($hashpwd != $pwd) { //Check if passwords match
        header('Location: ../?error=badpwd');
    }else { // Login and start session
        session_start();
        $_SESSION['id'] = $row['user_id'];
        $_SESSION['name'] = $row['username'];
        $sub_query = "INSERT INTO login_details (user_id) VALUES ('".$row['user_id']."') ";
        $sub_res = $conn->query($sub_query);
        $_SESSION['login_details_id'] = $conn->insert_id;
        header('Location: ../chat_room');
        exit();
    }
    mysqli_close($conn);
