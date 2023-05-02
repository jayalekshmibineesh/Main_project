<?php
session_start();
include 'connection.php';
$result=mysqli_query($con,"SELECT * FROM `customer_registration`");
if(isset($_POST['send']))
{
$notification=$_POST['notification'];
$Customer_id=$_POST['Customer_id'];
$sql=mysqli_query($con,"INSERT INTO `notification`(`Customer_id`, `Notification`) VALUES ('$Customer_id','$notification')");
if($sql)
{
    echo'<script>alert("Notification send Successfully" )</script>';
}
else
{
    echo"error in sending notification";
}
}
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
    
  .btn{
width: 60px;

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

      <h1 class="logo me-auto"><a href="index.php">TURF MANAGEMENT SYSTEM</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="adminhome.php">Home</a></li>
          <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>
          <li><a class="getstarted scrollto" href="adminhome.php">AdminHome</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
<form action="" method=POST>
    <div class="container"data-aos="fade-up" style="background-color:green; width:500px; margin-left:300px;float:left">
      <div class="row">
      <center><h3> <strong> ADMIN  SEND NOTIFICATION </strong></h3>
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                  
         <div class=" form-group mt-4">
            <?php echo"<select name='Customer_id'>" ;
            while($row=mysqli_fetch_assoc($result))
            {
                echo "<option value='" .$row['Customer_id']."'>".$row['Customer_name']."( ID:".$row['Customer_id'].") </option>";
            }
            echo "</select>";
            ?> <br><br>
         </div> 
        <div class="form-group-mt-5 mb-2">
            <textarea name="notification" id="" cols="20" rows="10" placeholder="type message here"></textarea>
        </div> <br>
             <center> <button type="submit" class="btn btn-primary mb-3"name="send"id="btn">send</button></center> 
        </div>
      </div>
      <center>
    </div>
</form>

  </section><!-- End Hero -->

  <!-- ======= Footer ======= -->
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

  <!-- <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a> -->

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