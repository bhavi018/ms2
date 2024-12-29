<!DOCTYPE html>
<html>
<head>
    <title>Search Customers</title>
</head>
<body>
    <h1>Search Customers</h1>
    <form method="GET" action="search.php">
        <input type="text" name="query" placeholder="Enter name, email, or phone" required>
        <button type="submit">Search</button>
    </form>
    
    <?php
    if (isset($_GET['query'])) {
        include 'db_config.php';

        // Sanitize the search query
        $query = $conn->real_escape_string($_GET['query']);

        // SQL query to search customers
        $sql = "SELECT * FROM customers 
                WHERE name LIKE '%$query%' 
                OR email LIKE '%$query%' 
                OR phone LIKE '%$query%'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<h2>Search Results:</h2>";
            echo "<table border='1'>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Balance</th>
                    </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['name']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['phone']}</td>
                        <td>{$row['balance']}</td>
                       
                    </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No customers found matching your query.</p>";
        }

        $conn->close();
    }
    ?>
</body>
</html>
