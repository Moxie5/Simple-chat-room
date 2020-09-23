<?php
ini_set('display_errors', 'On');
session_start();
require_once 'db.inc.php';

$query = "UPDATE login_details SET last_activity = now() WHERE login_details_id = '".$_SESSION['login_details_id']."' ";
$stat = $conn->query($query);

