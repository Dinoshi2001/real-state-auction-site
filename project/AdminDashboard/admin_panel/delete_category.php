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
    $categoryId = $_GET["id"];

    // Delete category from the database based on the ID
    $deleteSql = "DELETE FROM categories WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $categoryId);

    if ($stmt->execute()) {
        // Deletion successful, redirect back to categories page or display a success message
        header("Location: admin_categories.php");
        exit();
    } else {
        echo "Error deleting category: " . $stmt->error;
    }
}

$conn->close();
?>
