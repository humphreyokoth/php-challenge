<?php



$dbhost = "localhost";
$dbuser = "root";
$dbpass = "Present@1.";
$db = "jabakyc";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("connectfailed:%s\n" . $conn->error);
