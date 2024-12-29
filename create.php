<?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $balance = $_POST['balance'];

        // Database connection
      include 'db_config.php';

        $sql = "INSERT INTO customers (name, email, phone, balance) VALUES ('$name', '$email', '$phone', '$balance')";
        if ($conn->query($sql) === TRUE) {
            echo "Customer added successfully!";
        } else {
            echo "Error: " . $conn->error;
        }
        $conn->close();
    }
    ?>

<!DOCTYPE html>
<html>
<head>
    <title>Create Customer</title>
</head>
<body>
    <h1>Create New Customer</h1>
    <form action="create.php" method="POST">
        <label>Name:</label>
        <input type="text" name="name" required><br>
        <label>Email:</label>
        <input type="email" name="email" required><br>
        <label>Phone:</label>
        <input type="text" name="phone" required><br>
        <label>Balance:</label>
        <input type="number" name="balance" step="0.01" required><br>
        <button  type="submit">Add Customer</button>
    </form>
   
   <a href="read.php"> <button>VIEW</button></a>

  
</body>
</html>