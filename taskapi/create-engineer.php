<?php

error_reporting(E_ALL);
include 'db_connect.php';
// $conn = OpenCon();

// Insert new engineer
function insertEngineer($conn, $engineer_name, $role)
{

    // Validate role
    if (!in_array($role, ['engineer', 'pm'])) {
        throw new Exception("Invalid role");
    }

    // Insert engineer 

    $sql = "INSERT INTO engineers (engineer_name, role, created_at) VALUES ('$engineer_name', '$role', NOW())";
    if ($conn->query($sql)) {

        header("Content-Type: application/json", true, 201);

        echo json_encode(["message" => "Engineer inserted successfully"]);
    } else {
        throw new Exception("Error inserting engineer: " . $conn->error);
    }
}

insertEngineer($conn, $_POST['name'], $_POST['role']);


$conn->close();
