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

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $submissionId = $_GET["id"];

    // Delete contact form submission from the database based on the ID
    $deleteSql = "DELETE FROM contact_form WHERE id = ?";
    $stmt = $conn->prepare($deleteSql);
    $stmt->bind_param("i", $submissionId);

    if ($stmt->execute()) {
        // Deletion successful, redirect back to admin_contact.php or display a success message
        header("Location: admin_contact.php");
        exit();
    } else {
        echo "Error deleting contact form submission: " . $stmt->error;
    }
}

$conn->close();
?>
