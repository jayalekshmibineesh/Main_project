<?php
session_start();
include 'connection.php';
$id=$_SESSION['id'];;
$data="SELECT * FROM `customer_registration` WHERE Customer_id='$id'";
$result=mysqli_query($con,$data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CUSTOMER PROFILE</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <meta content="" name="description">
  <meta content="" name="keywords">

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
  <style>


           </style>

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- ======= Header ======= -->
<section id="hero">
  <div class="top">
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">TURF MANAGEMENT SYSTEM </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#"></a></li>
          <li><a class="nav-link scrollto" href="customerprofile_edit.php">Edit profile</a></li>
          <!-- <li><a class="nav-link   scrollto" href="#portfolio">search</a></li> -->
          
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>

          <li><a class="nav-link scrollto" href="#contact">Register</a></li> 
          <!-- <li><a class="nav-link scrollto" href="#">Register</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
          </div>
    </div>
  </header><!-- End Header -->
  
  <br><br><br><br>
</head>
<body>
  <!-- <section > -->
    <div  class ="container">
      <form method=POST>
        <div class= "card">
            <?php
        if(mysqli_num_rows($result)>0)
{
 while($row=mysqli_fetch_assoc($result))
 { 
  ?>
  <div class="card" style="width=25%">
  <div class="form-group mt-1">
  <img src="./images/<?php echo $row['image'];?>" height="50" width="50" alt="image not found">
      
    </div>
  <div class="form-group mt-4">
       <?php echo"Customer name :" .$row["Customer_name"]."<br>";?>
  </div>   
  <div class="form-group mt-4">
      <?php  echo "gender :" .$row["gender"]."<br>";?>
 </div>
 <div class="form-group mt-4">
   <?php echo "Email :" .$row["Email"]."<br>";?>
 </div>
 <div class="form-group mt-4">
   <?php echo "Address :" .$row["Address"]."<br>";?>
 </div>
 <div class="form-group mt-4">
  <?php  echo "Contact :" .$row["Contact"]."<br>";?>
 </div>
 <div class="form-group mt-4">  
 <?php echo "Date of Birth :" .$row["DOB"]."<br>";?>
 </div>
   <a class="btn btn-primary" href="customerprofile_edit.php?id=<?php echo $row['Customer_id']?>">edit</a> 
 </div>
 <?php
 }
 }   
 else
 {
  echo "No results found." ;
 }
 mysqli_close($con);

?> 
 </div>
    </div>
    </section>
    <div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
       

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


