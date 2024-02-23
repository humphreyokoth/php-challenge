<?php
error_reporting(E_ALL);
include 'db_connect.php';
// $conn = OpenCon();




// // Add milestone 

function addMilestone($conn, $projectId, $milestoneName) {

    // Validate project id
    if($projectId <= 0) {
      throw new Exception("Invalid project ID");
    }
  
 
    
    // Insert milestone 
    $sql = "INSERT INTO milestones (project_id, name, created_at)
            VALUES ($projectId, '$milestoneName', NOW())";
  
    if($conn->query($sql) === TRUE) {
      header("Content-Type: application/json", true, 200);
      echo json_encode(["message" => "Milestone added successfully"]);

    } else { 
      throw new Exception("Error adding milestone: " . $conn->error);
    }
  
  }
 
  
  $projectId = $_POST['project_id'];
  $milestoneName = $_POST['milestone_name'];
  
  addMilestone($conn, $projectId, $milestoneName);


$conn->close();