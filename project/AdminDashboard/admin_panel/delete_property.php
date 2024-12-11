<?php
// Include your database configuration and connection setup here
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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $propertyId = $_GET["id"];

    // Delete property from the database based on the ID
    $deleteSql = "DELETE FROM properties WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $propertyId);

    if ($stmt->execute()) {
        // Deletion successful, redirect back to properties page or display a success message
        header("Location: admin_properties.php");
        exit();
    } else {
        echo "Error deleting property: " . $stmt->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Delete Property</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #333;
            color: white;
            padding: 10px;
            margin: 0;
        }
        .container {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        p {
            margin-bottom: 20px;
        }
        .btn-container {
            text-align: center;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #f44336;
            color: white;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            text-decoration: none;
        }
        .btn:hover {
            background-color: #d32f2f;
        }
    </style>
</head>
<body>
    <h1>Delete Property</h1>
    <div class="container">
        <p>Are you sure you want to delete this property?</p>
        <div class="btn-container">
            <a class="btn" href="admin_properties.php">Cancel</a>
            <a class="btn" href="?id=<?php echo $propertyId; ?>">Confirm Delete</a>
        </div>
    </div>
</body>
</html>
