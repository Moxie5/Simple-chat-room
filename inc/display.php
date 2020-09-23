<?php 
ini_set('display_errors', 'On');
require_once 'db.inc.php';
session_start();
if (isset($_SESSION['id'])) {

    $query = "SELECT * FROM chat_message WHERE to_user_id = '0' ORDER BY timestamp ASC";
    $stat = $conn->query($query);


    while ($row = $stat->fetch_array()) {
        $id = $row['from_user_id'];
        $sql = "SELECT * FROM users WHERE user_id='$id'";
        $res = $conn->query($sql);
        $result = $res->fetch_assoc();
        $user_name = '';
        if($row['from_user_id'] == $_SESSION['id']) {
            $user_name = "<b class='you-msg'>You</b><div class='you-user'>";
        }else{
            $user_name = "<b class='from-msg'>".$result['username']."</b><div class='from-user'>";
        }
        $output = "";
        $output .= "<span>".$user_name.$row['chat_message']."</span>";
        $output .= "<div class='timestamp'><em>".$row['timestamp']."</em></div></div></div>";

        echo $output;
    }
}