<!DOCTYPE html>
<html>
<head>
    <title>View Customers</title>
</head>
<body>
    <h1>Customer List</h1>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Balance</th>
            
        </tr>
        <?php
        include 'db_config.php';

        $result = $conn->query("SELECT * FROM customers");
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['name']}</td>
                <td>{$row['email']}</td>
                <td>{$row['phone']}</td>
                <td>{$row['balance']}</td>
               
            </tr>";
        }
        $conn->close();
        ?>
    </table>
</body>
</html>
