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
    $userId = $_GET["id"];

    // Delete user from the database based on the ID
    $deleteSql = "DELETE FROM users WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $userId);

    if ($stmt->execute()) {
        // Deletion successful, redirect back to admin_users.php or display a success message
        header("Location: admin_users.php");
        exit();
    } else {
        echo "Error deleting user: " . $stmt->error;
    }
}

$conn->close();
?>
