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

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Insert data into the database
    $sql = "INSERT INTO contact_form (name, email, subject, message) VALUES ('$name', '$email', '$subject', '$message')";

    if ($conn->query($sql) === TRUE) {
        echo "Data inserted successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
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

<!--navigation bar-->
<nav class="navbar navbar-expand-lg navbar-custom">
  <img style="height: 40px; width: 100px;" src="images/logo2.jpg">
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
          Properties
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="buildings.html">Buildings</a></li>
          <li><a class="dropdown-item" href="houses.html">Houses</a></li>
          <li><a class="dropdown-item" href="lands.html">Lands</a></li>
        </ul>
      </li>
      
      <li class="nav-item">
        <a class="nav-link" href="sell_property.php">Sell property</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contactus.php">Contact Us</a>
      </li>
      
    </ul>
  </div>
  <form class="form-inline">
    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button style="background-color:white; color: black;" class="btn btn-outline-primary my-2 my-sm-0" type="submit">Search</button>
  </form>
</nav>
<!--navigation bar end-->


   <!-- Slide start-->

   <div class="carousel-inner">
    <div class="carousel-item active">
      <img style="height:600px;" src="images/contact.1.jpg" class="d-block w-100" alt="Image 1">
      <div class="carousel-caption">
        <h3>Feedback</h3>
      </div>
    </div> 
>
  <div class="container">
    <div class="row justify-content-center align-items-center">
      <div class="col-lg-9 text-center mt-5">
        <nav
          aria-label="breadcrumb"
          data-aos="fade-up"
          data-aos-delay="200"
        >
        </nav>
      </div>
    </div>
  </div>
</div>
<!-- slide end-->

<!--icon part start-->
<br><br>
<div class="container">
    <div class="row">
      <div class="col-md-6">
        <div style="padding: 1px; border-width: 0px;" class="card mb-4">
          <div class="card-body d-flex">
            <i class="fas fa-envelope fa-2x mr-3"></i>
            <div>
              <h5 style="font-size: 15px;" class="card-title">Email</h5>
              <p class="card-text">example@example.com</p>
            </div>
          </div>
        </div>
        <div style="padding: 1px; border-width: 0px;" class="card mb-4">
          <div class="card-body d-flex">
            <i class="fas fa-phone fa-2x mr-3"></i>
            <div>
              <h5 style="font-size: 15px;" class="card-title">Contact Number</h5>
              <p class="card-text">+123456789</p>
            </div>
          </div>
        </div>
        <div style="padding: 1px; border-width: 0px;" class="card mb-4">
          <div class="card-body d-flex">
            <i class="fas fa-map-marker-alt fa-2x mr-3"></i>
            <div>
              <h5 style="font-size: 15px;" class="card-title">Location</h5>
              <p class="card-text">123 Main Street, City, Country</p>
            </div>
          </div>
        </div>
        <div style="padding: 1px; border-width: 0px;" class="card mb-4">
          <div class="card-body d-flex">
            <i class="fas fa-clock fa-2x mr-3"></i>
            <div>
              <h5 style="font-size: 15px;" class="card-title">Open Hours</h5>
              <p class="card-text">Mon-Fri: 9am-5pm</p>
            </div>
          </div>
        </div>
      </div>
     
      <!--icon part end-->

   <!--contact form start-->   

    <div class="col-md-6">
      <div class="card border-primary">
        <div class="card-body">
          <h5 class="card-title text-center mb-4">Feedback</h5>

          <form action="contactus.php" method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Subject</label>
                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter the subject" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea class="form-control" id="message" name="message" rows="4" placeholder="Enter your message" required></textarea>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
        
        </div>
      </div>
    </div>
  </div>
</div>

  <br><br>

  <!--contact form end-->

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

