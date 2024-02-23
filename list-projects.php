<?php

error_reporting(E_ALL);
include 'db_connect.php';
// $conn = OpenCon();


// Get projects for engineer


function getEngineerProjects($conn, $engineerId)
{

    // Validate engineer id
    if ($engineerId <= 0) {
        throw new Exception("Invalid engineer ID");
    }

    // Query projects
    $sql = "SELECT projects.*, engineers.name AS engineer_name 
    FROM projects 
    INNER JOIN engineers ON projects.engineer_id = engineers.id 
    WHERE projects.engineer_id = $engineerId";


    $result = $conn->query($sql);

    // Check if any projects found
    if ($result->num_rows == 0) {
        return null;
    }

    // Output projects as array
    $projects = array();
    while ($row = $result->fetch_assoc()) {
        $projects[] = $row;
    }
    if ($projects) {
        header("Content-Type: application/json", true, 200);
        echo json_encode([
            "message" => "List of engineers projects",
            "data" => $projects
        ]);
    } else {
        echo "No projects found";
    }
}
$engineerId = (int)$_GET['engineer_id'];


$projects = getEngineerProjects($conn, $engineerId);


$conn->close();
