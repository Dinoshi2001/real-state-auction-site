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

    // Fetch property data from the database based on the ID
    $sql = "SELECT * FROM properties WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $propertyId);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $property = $result->fetch_assoc();
        // Now you can use $property array to pre-fill form fields or display property details
    } else {
        echo "Property not found.";
    }
} elseif ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["update"])) {
    // Handle form submission to update property
    $propertyId = $_POST["property_id"];
    $newTitle = $_POST["new_title"];
    $newCategory = $_POST["new_category"];
    $newPrice = $_POST["new_price"];

    // Perform update query
    $updateSql = "UPDATE properties SET title = ?, category_id = ?, price = ? WHERE id = ?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("sidi", $newTitle, $newCategory, $newPrice, $propertyId);

    if ($stmt->execute()) {
        // Update successful, redirect back to properties page or display a success message
        header("Location: admin_properties.php");
        exit();
    } else {
        echo "Error updating property: " . $stmt->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Property</title>
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
        form {
            width: 80%;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        label {
            display: block;
            margin-bottom: 8px;
        }
        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Edit Property</h1>
    <form method="post">
        <input type="hidden" name="property_id" value="<?php echo $property['id']; ?>">
        <label for="new_title">Title:</label>
        <input type="text" name="new_title" value="<?php echo $property['title']; ?>"><br>
        <label for="new_category">Category:</label>
        <input type="text" name="new_category" value="<?php echo $property['category_id']; ?>"><br>
        <label for="new_price">Price:</label>
        <input type="text" name="new_price" value="<?php echo $property['price']; ?>"><br>
        <input type="submit" name="update" value="Update">
    </form>
</body>
</html>
