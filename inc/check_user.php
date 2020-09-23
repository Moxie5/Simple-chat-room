<?php
session_start();
ini_set('display_errors', 'On');
require_once 'db.inc.php';
if (isset($_SESSION['id'])) {

    $query = "SELECT * FROM users WHERE user_id !='".$_SESSION['id']."' ";
    $stat = $conn->query($query);

    $result = "<div id='users-online'>Users Online</div>";

        while ($row = $stat->fetch_assoc()) {
            $status = '';
            $current_time = strtotime(date('Y-m-d H:i:s') . '-10 second');
            $current_time = date('Y-m-d H:i:s', $current_time);
            $user_last_activity = user_last_activity($row['user_id'], $conn);
            if ($user_last_activity > $current_time) {
                $status = "<span class='online'></span>";
            }else {
                $status = "<span class='offline'></span>";
            }
            $result .= "<div class='users'>".$status." ".$row['username']."</div>";
        }
    echo $result;
}