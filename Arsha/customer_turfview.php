   <?php
  include 'connection.php';
  $sql=mysqli_query($con,"SELECT * FROM turf"); 
  ?>
  
    
  <!DOCTYPE html>
  <html lang="en">
  <head>
  </style><meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TURF MANAGEMENT SYSTEM</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Jost:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
<style>
  .card
  {
    display:inline-block;
    width:15%;
    display: flex;
    justify-content:space-between;
    margin-left: 5px;
  }
  
  </style>

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
</head>
  <body>
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">TURF MANAGEMENT SYSTEM </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
          <li><a class="nav-link scrollto" href="#services"></a></li>
          <!-- <li><a class="nav-link   scrollto" href="#portfolio">search</a></li> -->
          
          <li><a class="nav-link scrollto" href="customer_profile.php">view profile</a></li>

          <!-- <li><a class="nav-link scrollto" href="customer_turfview.php"></a></li>  -->
          <!-- <li><a class="nav-link scrollto" href="#">Register</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<!--  ======= Hero Section ======= -->
 
  <section id="hero" class="d-flex align-items-center">>
   <div class="container mt-1" data-aos="fade-up">
  <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
    <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="150">          
      
        
        <?php
      while($row=mysqli_fetch_assoc($sql))
      {
      ?>  
      <div class="card" style="width:50%; margin-left:50px;">
      <div  class="card-body">
      
 <div class="form-group mt-4"> 
 <!-- <img src="./images/<?php echo $row['image'];?>" height="50" width="50" alt="image not found"> -->
       
 <?php echo'<img src="./images/'.$row["Image"].'" height="200px" width="200px">';?> 
        </div> 
        <div class="form-group mt-4">
            <?php echo "Turf_id: " .$row['Turf_id'];?>
        </div>
        <div class="form-group mt-4">
            <?php echo "Turf_name: " .$row['Turf_name'];?>
        </div>
        <div class="form-group mt-4">
            <?php echo "Turf_place: " .$row['Turf_place'];?>
        </div>
        <div class="form-group mt-4">
            <button class="btn"name="submit" style="background-color: blue; padding-left: 25px;">Book Now</button>
        </div>
      </div>
      </div>
      <?php
     }
      ?>          
    </div>
  </div>
</div>
 
  
    </section>  
  <!-- Vendor JS Files
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> 
 
   Template Main JS File -->
  <script src="assets/js/main.js"></script><br>

  <footer id="footer">
<div class="container footer-bottom clearfix">
  <div class="copyright">
    &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
    <!-- All the links in the footer should remain intact. -->
    <!-- You can delete the links only if you purchased the pro version. -->
    <!-- Licensing information: https://bootstrapmade.com/license/ -->
    <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/arsha-free-bootstrap-html-template-corporate/ -->
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</div>
</footer><!-- End Footer -->
  
  </body>
  </html>