<?php

error_reporting(E_ALL);
include 'db_connect.php';
// $conn = OpenCon();


// Update project status
function updateProjectStatus($conn, $projectId, $newStatus)
{

    // Validate project ID
    if ($projectId <= 0) {
        throw new Exception("Invalid project ID");
    }

    // Get current status
    $sql = "SELECT status FROM projects WHERE id = $projectId";
    $result = $conn->query($sql);
    $currentStatus = $result->fetch_assoc()['status'];

    // Do not allow changing completed status
    if ($currentStatus == 'completed' && $newStatus != 'completed') {
        throw new Exception("Cannot change status of a completed project");
    }

    // Update status
    $sql = "UPDATE projects 
          SET status = '$newStatus' 
          WHERE id = $projectId";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        throw new Exception("Error updating project status: " . $conn->error);
    }
}



$projectId = $_POST['project_id'];
$newStatus = $_POST['new_status'];

$result = updateProjectStatus($conn, $projectId, $newStatus);

if ($result) {
    // Success
    header("Content-Type: application/json");
    echo json_encode(["message" => "Status updated"]);
}

$conn->close();
