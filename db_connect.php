<?php


// function OpenCon(){
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $db = "tasks";
    $conn = new mysqli($dbhost,$dbuser,$dbpass,$db) or die ("connectfailed:%s\n".$conn->error);
    // return $conn;
// }
// function CloseCon($conn){
//  $conn->close();
// }

