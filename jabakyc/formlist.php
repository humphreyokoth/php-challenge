<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submitted Items</title>
    <link rel="stylesheet" href="formlist.css">
</head>

<body>
    <h2>Submitted Items</h2>
    <table>
        <thead>
            <tr>
                <th>Staff Name</th>
                <th>Staff Email</th>
                <th>Form Name</th>
                <th>Name</th>
                <th>NIN</th>
                <th>Email</th>
                <th>Address</th>
                <th>Submission Date</th>
            </tr>
        </thead>
        <tbody>
            <!-- PHP code to dynamically populate the table -->
            <?php
            // Include the database connection file
            include 'db_connect.php';
           

            // Query to retrieve all form entries from the database
            $sql = "SELECT * FROM form_entries";
            $result = $conn->query($sql);

            // Check if there are any rows returned
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['staff_name'] . "</td>";
                    echo "<td>" . $row['staff_email'] . "</td>";
                    echo "<td>" . $row['form_name'] . "</td>";
                    echo "<td>" . $row['name'] . "</td>";
                    echo "<td>" . $row['nin'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['address'] . "</td>";
                    echo "<td>" . $row['submission_date'] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='8'>No entries found</td></tr>";
            }

            // Close the database connection
            $conn->close();
            ?>
        </tbody>
    </table>
</body>

</html>
