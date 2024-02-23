<?php



$dbhost = "";
$dbuser = "";
$dbpass = "";
$db = "";
$conn = new mysqli($dbhost, $dbuser, $dbpass, $db) or die("connectfailed:%s\n" . $conn->error);
