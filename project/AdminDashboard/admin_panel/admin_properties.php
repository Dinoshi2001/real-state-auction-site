<?php
// Database configuration
$servername = "localhost";
$username = "sanuvi";
$password = "sanuvi1222";
$dbname = "realbidz2";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Properties</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        h1 {
            background-color: #333;
            color: white;
            padding: 10px;
            margin: 0;
        }
        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        a {
            text-decoration: none;
        }
        .actions {
            white-space: nowrap;
        }
        .edit-btn, .delete-btn {
            padding: 6px 10px;
            border: none;
            cursor: pointer;
        }
        .edit-btn {
            background-color: #4CAF50;
            color: white;
        }
        .delete-btn {
            background-color: #f44336;
            color: white;
            margin-left: 5px;
        }

        .button-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin: 10px;
        }
        .add-btn-container {
            text-align: right;
            margin-top: 20px;
            margin-right: 10px;
        }
        .add-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .add-btn:hover {
            background-color: #0056b3;
        }

        .dashboard-btn-container {
            text-align: left;
            margin-top: 20px;
            margin-left: 10px;
        }
        .dashboard-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #136700;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .dashboard-btn:hover {
            background-color: #003A0D;
        }
    </style>
</head>
<body>
    <h1>Manage Properties</h1>
<br>
    <div class="button-container">
    <!-- Button to Admin Dashboard Page -->
    <a class="dashboard-btn" href="admin_dashboard.php">Back to Dashboard</a>
    <a class="add-btn" href="Add_Property.php">Add Property</a>
</div>

<br><br>

    <?php
    // Fetch properties from the database
    $sql = "SELECT p.id, p.title, c.name AS category, p.price FROM properties p
    INNER JOIN categories c ON p.category_id = c.id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
// Display property data in a table
echo "<table>";
echo "<tr><th>ID</th><th>Title</th><th>Category</th><th>Price</th><th>Actions</th></tr>";

while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['title'] . "</td>";
    echo "<td>" . $row['category'] . "</td>";
    echo "<td>$" . $row['price'] . "</td>";
    echo "<td class='actions'><a class='edit-btn' href='edit_property.php?id=" . $row['id'] . "'>Edit</a>";
    echo "<a class='delete-btn' href='delete_property.php?id=" . $row['id'] . "'>Delete</a></td>";
    echo "</tr>";
}

echo "</table>";
} else {
echo "No properties found.";
}

$conn->close();
    ?>
</body>
</html>
