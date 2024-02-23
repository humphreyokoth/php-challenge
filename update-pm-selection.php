<?php



error_reporting(E_ALL);
include 'db_connect.php';
// $conn = OpenCon();


// Mark project as completed (only for PM role)
function markProjectCompleted($conn, $projectId, $userRole)
{

    // Validate project ID
    if ($projectId <= 0) {
        throw new Exception("Invalid project ID");
    }

    // Verify user role
    if ($userRole !== 'pm') {
        throw new Exception("Only project managers can mark a project as completed");
    }

    // Update project status
    $sql = "UPDATE projects 
            SET status = 'completed'  
            WHERE id = $projectId";

    if ($conn->query($sql) === TRUE) {
        return true;
    } else {
        throw new Exception("Error marking project as completed: " . $conn->error);
    }
}


$projectId = $_POST['project_id'];
$userRole = $_POST['role'];

try {
    $result = markProjectCompleted($conn, $projectId, $userRole);

    if ($result) {
        // Success
        header("Content-Type: application/json");
        echo json_encode(["message" => "Project completed"]);
    }
} catch (Exception $e) {
    // Handle exception
    header("Content-Type: application/json");
    echo json_encode(["error" => $e->getMessage()]);
}


$conn->close();
