<?php


// function OpenCon(){
    $dbhost = "";
    $dbuser = "";
    $dbpass = "";
    $db = "";
    $conn = new mysqli($dbhost,$dbuser,$dbpass,$db) or die ("connectfailed:%s\n".$conn->error);
    // return $conn;
// }
// function CloseCon($conn){
//  $conn->close();
// }

