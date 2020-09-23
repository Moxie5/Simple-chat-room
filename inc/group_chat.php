<?php
ini_set('display_errors', 'On');

session_start();
require_once 'db.inc.php';

if ($_POST['action'] == "insert_data") {
    $msg = $_POST['chat_message'];
    $from_user = $_SESSION['id'];
    $to_user = '0';
    $timestamp = date('Y-m-d H:i:s');
    $query = "INSERT INTO chat_message (to_user_id, from_user_id, chat_message, timestamp) VALUES ('$to_user', '$from_user', '$msg', '$timestamp') ";
    
    
    if ($stat = $conn->query($query)) {
        echo fetch_group_history($conn);
    }
    
    echo mysqli_error($conn);
}
if (isset($_SESSION['id'])) {

    if ($_POST['action'] == "fetch_data") {
        
        echo fetch_group_history($conn);
    }
}