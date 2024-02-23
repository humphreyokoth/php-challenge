<?php

error_reporting(E_ALL);
include 'db_connect.php';


function updateAssignedEngineer($conn, $projectId, $engineerId)
{
    // Validate inputs
    if ($projectId <= 0) {
        throw new Exception("Invalid project ID");
    }

    // Check if the engineer ID exists
    $checkEngineer = "SELECT id FROM engineers WHERE id = $engineerId";
    $resultEngineer = $conn->query($checkEngineer);
    if (!$resultEngineer || $resultEngineer->num_rows === 0) {
        throw new Exception("Invalid engineer ID");
    }

    // Fetch project details including current engineer
    $sql = "SELECT engineer_id FROM projects WHERE id = $projectId";
    $result = $conn->query($sql);

    if (!$result || $result->num_rows === 0) {
        throw new Exception("Project not found");
    }

    // Get the current engineer ID from the fetched project details
    $row = $result->fetch_assoc();
    $currentEngineerId = $row['engineer_id'];

    // Check if the new engineer ID is different from the current one
    if ($currentEngineerId != $engineerId) {
        // Update assigned engineer
        $sqlUpdate = "UPDATE projects
                      SET engineer_id = $engineerId
                      WHERE id = $projectId";

        if ($conn->query($sqlUpdate) === TRUE) {
            return true;
        } else {
            throw new Exception("Error updating assigned engineer: " . $conn->error);
        }
    } else {
        throw new Exception("The provided engineer is already assigned to the project");
    }
}


$projectId = $_POST['id'];
$engineerId = $_POST['engineer_id'];

try {
    error_log("Received project ID: $projectId, Engineer ID: $engineerId");
    $result = updateAssignedEngineer($conn, $projectId, $engineerId);
    // Success, return JSON response
    header("Content-Type: application/json");
    echo json_encode(["message" => "Engineer updated"]);
} catch (Exception $e) {
    // Handle exception
    error_log("Error: " . $e->getMessage());
    header("Content-Type: application/json", false, 500);
    echo json_encode(["error" => $e->getMessage()]);
}


$conn->close();
