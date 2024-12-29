<?php
include 'db_config.php'; // Include DB config

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize and get the ID from the form
    $id = (int)$_POST['id']; // Casting the ID to an integer to prevent SQL injection

    // Prepare the DELETE query
    $sql = "DELETE FROM customers WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        echo "Customer deleted successfully!";
    } else {
        echo "Error: " . $conn->error;
    }

    $conn->close();
    
    // Redirect to read.php after successful deletion
    header("Location: read.php");
    exit(); // Make sure no further code is executed after the header
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Customer</title>
</head>
<body>
    <h1>Delete Customer</h1>
    <!-- Form to delete a customer by ID -->
    <form action="delete.php" method="POST">
        <label for="id">Customer ID:</label>
        <input type="number" name="id" required><br>
        <button type="submit">Delete</button>
    </form>
</body>
</html>
