<?php



include 'db_connect.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

function createProject($conn, $engineer_id, $project_name, $status)
{

    // Validate status value against enum values
    $validStatusValues = ['awaiting-start', 'in-progress', 'on-hold'];
    if (!in_array($status, $validStatusValues)) {
        // Handle invalid status value (e.g., throw an error, set a default value, etc.)
        throw new Exception("Invalid status value: $status");
    }
    // query to insert project
    $sql = "INSERT INTO projects (engineer_id, project_name, status, created_at) VALUES ('$engineer_id', '$project_name','$status', NOW())";

    // Execute the query
    if ($conn->query($sql) === TRUE) {
        header("Content-Type: application/json", true, 201);
        $last_id = $conn->insert_id;
        echo json_encode(["message" => "Created project with ID $last_id"]);
    } else {
        throw new Exception("Error creating project: " . $conn->error);
    }
}
$engineerId = $_POST['engineer_id'];
$projectName = $_POST['project_name'];
$status =  $_POST['status'];

createProject($conn, $engineerId, $projectName, $status);


$conn->close();
