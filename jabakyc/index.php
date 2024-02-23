<?php
// Check if the form has been submitted
if (isset($_GET['submit'])) {
    
    header('Location: formlist.php?submit=success');
    exit;  
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jaba KYC</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h2>Create Online Form</h2>
        
        <form action="submit_form.php" method="post">
            <fieldset>
                <legend>Staff Information</legend>
                <label for="staff_name">Staff Name:</label><br>
                <input type="text" id="staff_name" name="staff_name" required><br>

                <label for="staff_email">Staff Email:</label><br>
                <input type="email" id="staff_email" name="staff_email" required><br>
            </fieldset>
            <fieldset>
                <legend>Form Data</legend>
                <label for="form_name">Form Name:</label><br>
                <input type="text" id="form_name" name="form_name" required><br>
                <label for="name">Name:</label><br>
                <input type="text" id="name" name="name" required><br>

                <label for="nin">National Identification Number (NIN):</label><br>
                <input type="text" id="nin" name="nin" required><br>

                <label for="email">Email:</label><br>
                <input type="email" id="email" name="email" required><br>

                <label for="address">Address:</label><br>
                <input type="text" id="address" name="address" required><br>
            </fieldset>
            <input type="submit" value="Submit Form">
        </form>
    </div>
</body>

</html>