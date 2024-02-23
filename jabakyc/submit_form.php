<?php
// Include the database connection file
include "db_connect.php";


// Retrieve form data from POST request
$staffName = $_POST['staff_name'];
$staffEmail = $_POST['staff_email'];
$formName = $_POST['form_name'];
$name = $_POST['name'];
$nin = $_POST['nin'];
$email = $_POST['email'];
$address = $_POST['address'];

function submitForm($conn, $staffName, $staffEmail, $formName, $name, $nin, $email, $address)
{

   
$sql = "INSERT INTO form_entries (staff_name, staff_email, form_name, name, nin, email, address, created_at) 
VALUES ('{$staffName}', '{$staffEmail}', '{$formName}', '{$name}', '{$nin}', '{$email}', '{$address}', NOW())";
// Execute the SQL query
   
    if ($conn->query($sql)) {

        header("Location: formlist.php");
        

        // echo json_encode(["message" => "Data inserted successfully"]);
    } else {
        throw new Exception("Error inserting data: " . $conn->error);
    }
}

submitForm($conn, $_POST['staff_name'], $_POST['staff_email'],$_POST['form_name'],$_POST['name'],$_POST['nin'],$_POST['email'],$_POST['address']);




// Close the database connection
$conn->close();

