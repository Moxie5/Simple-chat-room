<?php 
ini_set('display_errors', 'On');
include_once 'config.php';
$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (isset($_SESSION['id'])) {

    function user_last_activity($user_id, $conn) {
        $query = "SELECT * FROM login_details WHERE user_id = '$user_id' ORDER BY last_activity DESC LIMIT 1";
        $stat = $conn->query($query);

        while ($row = $stat->fetch_array()) {
            return $row['last_activity'];
        }
    }
    
    function fetch_group_history($conn) {
        $query = "SELECT * FROM (SELECT * FROM chat_message WHERE to_user_id = '0' ORDER BY timestamp DESC LIMIT 8) chat_message ORDER BY timestamp ASC";
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
}
//If connection to database faild echo error
if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}