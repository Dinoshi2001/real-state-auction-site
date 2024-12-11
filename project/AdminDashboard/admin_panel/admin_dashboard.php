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
    <title>Admin Dashboard</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
        }
        h1 {
            background-color: #333;
            color: white;
            padding: 10px;
            margin: 0;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 10px;
        }
        li a {
            display: block;
            padding: 10px;
            background-color: #fff;
            border: 1px solid #ddd;
            text-decoration: none;
            color: #333;
            transition: background-color 0.3s, color 0.3s;
        }
        li a:hover {
            background-color: #333;
            color: white;
        }


        .button-container {
            text-align: center;
            margin-top: 20px;
        }
        .dashboard-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .dashboard-btn:hover {
            background-color: #5E0064;
        }

        .dashboard-btn1 {
            display: inline-block;
            padding: 10px 20px;
            background-color: #FF0F0F;
            color: white;
            border: none;
            cursor: pointer;
            text-decoration: none;
        }
        .dashboard-btn1:hover {
            background-color: #990000;
        }

    </style>
</head>
<body>
   <br>
    <h1>Admin Dashboard</h1>
    <br><br><Br><br>
    <ul>
        <li><a href="admin_categories.php">Manage Categories</a></li>
        <li><a href="admin_properties.php">Manage Properties</a></li>
        <li><a href="admin_users.php">Manage Users</a></li>
        <li><a href="admin_contact.php">Manage Feadback</a></li>
    </ul>

    <br><br><Br>
    <div class="button-container">
        <!-- Button to Admin Properties Page -->
        <a class="dashboard-btn" href="admin_properties.php">Manage Categories</a>
        <a class="dashboard-btn" href="Add_Property.php">Manage Properties</a>
        <a class="dashboard-btn" href="admin_users.php">Manage Users</a>
        <a class="dashboard-btn" href="admin_contact.php">Manage Feadback</a>
        <br><br>
        <center>
        <a class="dashboard-btn1" href="../../login.php">Log Out</a>
        </center>

    </div>

</body>
</html>

