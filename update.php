<?php
include 'db_config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve values from the form
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $balance = $_POST['balance'];

    // Update the record in the database
    $sql = "UPDATE customers SET name='$name', email='$email', phone='$phone', balance='$balance' WHERE id=$id";
    if ($conn->query($sql) === TRUE) {
        echo "Customer updated successfully!";
    } else {
        echo "Error: " . $conn->error;
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Customer</title>
</head>
<body>
    <h1>Update Customer</h1>
    <form action="update.php" method="POST">
        <!-- ID Field -->
        <label>ID:</label>
        <input type="number" name="id" required><br>
        <!-- Editable Fields -->
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Phone:</label>
        <input type="text" name="phone" required><br>
        <label>Balance:</label>
        <input type="number" name="balance" step="0.01" required><br>
        <!-- Submit Button -->
        <button type="submit">Update</button>
    </form>
</body>
</html>
