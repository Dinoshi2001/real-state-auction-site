<?php
session_start(); // Start a session

// Connect to the database
$host = 'localhost';
$db   = 'realbidz2';
$user = 'sanuvi';
$pass = 'sanuvi1222';
$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user input
    // ...

    // Query the database for the user
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        
        // Verify password (remember to use password_verify)
        if (password_verify($password, $row['password'])) {
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['user_type'] = $row['user_type'];
            
            // Redirect based on user type
            if ($_SESSION['user_type'] === 'user') {
                header("Location: home_page.html");
            } elseif ($_SESSION['user_type'] === 'admin') {
              header("Location: AdminDashboard/admin_panel/admin_dashboard.php");
            } else {
                // Handle other user types if needed
            }
            
            exit(); // Make sure to exit after the redirect
        } else {
            echo "Incorrect password.";
        }
    } else {
        echo "User not found.";
    }
}

$conn->close();
?>



<!DOCTYPE html>
<html>
<head>
  <title>RealBidz</title>
<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>

  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.2/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-***" crossorigin="anonymous" />


  <style>

  /*navigation bar start css*/
    .navbar-custom {
      background-color: #00008B; /* Dark Blue */
      color: #ffffff; /* Text color */
    }
    .navbar-custom .navbar-nav .nav-link {
      color: #ffffff; /* Link text color */
    }

    /*navigation bar end css*/

    /*footer css code start*/

    .footer {
      background-color: #00008B; /* Dark Blue */
      color: #ffffff; /* Text color */
    }

    .footer a{
      text-decoration: none;
      color: white;
      font-size: 18px;
    }

    /*footer css code end*/

    /*slide show image code start*/

    .carousel-item img {
  filter: none;
}

.carousel-caption h3 {
    font-size: 58px;
  }

  /*slide show image code end*/

  /*auction part start css*/

   .auction-list {
      margin-top: 20px;
    }

    /*auction part end css*/

  </style>

</head>
<body>

  <!--
  <nav class="navbar navbar-expand-lg navbar-custom">
    <img style="height: 40px; width: 100px;" src="images/logo2.jpg">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item active">
          <a class="nav-link" href="home_page.html">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="aboutus.html">About Us</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="services.html">Services</a>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Properties
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="buildings.html">Buildings</a>
            <a class="dropdown-item" href="houses.html">Houses</a>
          
            <a class="dropdown-item" href="lands.html">Lands</a>
          </div>
        <li class="nav-item">
          <a class="nav-link" href="sell_property.html">Sell Property</a>
        </li>
         <li class="nav-item">
          <a class="nav-link" href="contatus.html">Contact Us</a>
        </li>
        
      </ul>
    </div>
    <form class="form-inline">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button style="background-color:white; color: black;" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
    </form>
  </nav>

   Navigation bar end-->

<!--log in form start-->

<!--log in form start-->
<form action="login.php" method="post">

  <div class="container d-flex justify-content-center align-items-center min-vh-100">
      <div class="row border rounded-5 p-3 bg-white shadow box-area">
          <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box" style="background: #103cbe;">
              <!-- ... Left box content ... -->
          </div>
          <div class="col-md-6 right-box">
              <div class="row align-items-center">
                  <!-- ... Other form elements ... -->
                  <h2><center>Login</center> </h2>
                  <div class="input-group mb-3">
                      <input type="text" class="form-control form-control-lg bg-light fs-6" name="email" placeholder="Email address">
                  </div>
                  <div class="input-group mb-1">
                      <input type="password" class="form-control form-control-lg bg-light fs-6" name="password" placeholder="Password">
                  </div>
                  <div class="input-group mb-5 d-flex justify-content-between">
                      <div class="form-check">
                          <input type="checkbox" class="form-check-input" id="formCheck">
                          <label for="formCheck" class="form-check-label text-secondary"><small>Remember Me</small></label>
                      </div>
                      <div class="forgot">
                          <small><a href="#">Forgot Password?</a></small>
                      </div>
                  </div>
                  <div class="input-group mb-3">
                      <button type="submit" class="btn btn-lg btn-primary w-100 fs-6">Login</button>
                  </div>

                  <div class="row">
                      <small>Don't have an account? <a href="sign_up.php">Sign Up</a></small>
                  </div>
              </div>
          </div>
      </div>
  </div>
</form>

<!--log in form end-->

<!-- Footer -->
<footer class="footer">
    <div class="container py-4">
      <div class="row">
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
         
          <ul class="list-unstyled">
            <li>
              <h4>Join with us</h4>
            </li>
            <li>
             <h6>Real Bidz auctions<br>colombo 07 <br> Sri Lanka</h6>
            
            </li>


            <li>

              <h6>www.RealBidz@gmail.com</h6>
            </li>
            <li>
              <h6>011-3456223<br>012-3456765</h6>
            </li>
            
            
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          
          <ul class="list-unstyled">
            <li>
              <a  href="#!">Home</a>
            </li>
            <li>
              <a href="#!">About Us</a>
            </li>
            <li>
              <a href="#!">Contact Us</a>
            </li>
            <li>
              <a href="#!">Register</a>
            </li>
            <li>
              <a href="#!">Services</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
         
          <ul class="list-unstyled">
            <li>
              <a href="#!">apartment</a>
            </li>
            <li>
              <a href="#!">Houses</a>
            </li>
            <li>
              <a href="#!">Lands</a>
            </li>
            <li>
              <a href="#!">property</a>
            </li>
            <li>
              <a href="#!">sell property</a>
            </li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          
          <ul class="list-unstyled">
            <li>
              

            </li>
             <a href="https://example.com" target="_blank"><i class="fab fa-facebook"></i> Facebook</a>
            <li>
              <a href="https://example.com" target="_blank"><i class="fab fa-twitter"></i> Twitter</a>
            </li>
            <li>
              <a href="https://example.com" target="_blank"><i class="fab fa-instagram"></i> Instagram</a>
            </li>
            <li>
              <a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin"></i> LinkedIn</a>
            </li>
            <li>
              <a href="https://api.whatsapp.com/send?phone=1234567890" target="_blank"><i class="fab fa-whatsapp"></i> WhatsApp</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <div class="text-center py-3" style="background-color: #00005A;"> <!-- Dark Blue -->
      &copy; Copyright RealBidz All Right Reserved.
    </div>
  </footer>


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

</body>
</html>

