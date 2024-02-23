<?php



$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$db = "jabakyc";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("connectfailed:%s\n" . $conn->error);
