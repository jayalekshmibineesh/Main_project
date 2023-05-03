<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['id']))
{
    header('location:login.php');
}
else
{
$sql=mysqli_query($con,"SELECT * FROM  turf");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>COMMON TEMPLATE</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<style>
   
  .card
  {
    display:inline-block;
    width:%;
    display: flex;
    justify-content:space-between;
    margin-left: 50px;
  }
  
  
 
   
</style>
  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Arsha
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">TURF MANAGEMENT SYSTEM</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
          <li><a class="nav-link scrollto" href="customer_profile.php">Back</a></li>         
          <li><a class="getstarted scrollto" href="customer_home.php">Home</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
    </div>
  </header><!-- End Header 
  ======= Hero Section ======= -->
  
<main id="main">
 <section>
  <div class="container">
  <div class="row">
    <?php while($row=mysqli_fetch_assoc($sql)) { ?>
    <div class="col-md-4">
      <div class="card" style="margin-bottom: 20px;border-radius:40px;">
        <img  src="./images/<?php echo $row['Image']; ?>" alt="image not found">
       <center>
        <div class="card-body">
          <h5 class="card-title"><?php echo $row['Turf_name']; ?></h5>
          <p class="card-text"><?php echo $row['Turf_place']; ?></p>
          <p class="card-text">Amount: <?php echo $row['Amount']; ?></p>
          <a href="bookturf.php?id=<?php echo $row['Turf_id']; ?>" class="btn btn-primary">Book Now</a>
        </div>
        </center>
      </div>
    </div>
    <?php } ?>
  </div>
</div>  
 </main>
  <!-- /End #main

  <======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Futura</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

 </body>
</html>

<?php
}
?>