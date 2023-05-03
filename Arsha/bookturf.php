<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['id']))
{
    header('location:login.php');
}
else
{
 $id1=$_GET['id']; 
 $result=mysqli_query($con,"SELECT * FROM `turf`WHERE `Turf_id`='$id1'");
 
if(isset($_POST['submit']))
{
 $fromdate=$_POST['fromdate'];
 $todate=$_POST['todate'];
 $id=$_SESSION['id'];
 $sql1=mysqli_query($con,"SELECT * FROM `bookturf` WHERE Turf_id='$id1' AND From_date<='$todate' AND To_date >='$fromdate'");
 if(mysqli_num_rows($sql1)>0)
 {
  echo"<script> alert('Sorry this turf already booked')</script>";
 }
 else
 {
  $sql=mysqli_query($con,"INSERT INTO bookturf ( From_Date, To_Date, Turf_id ,Customer_id)VALUES('$fromdate','$todate','$id1','$id')");
  $book=mysqli_insert_id($con);
  $_SESSION['Booking_id']=$book;
  if(($sql)==true)
  {
    echo"<script>alert('succesfully booked')</script>";
    header('location:payment.php');
  }
 else
 {
echo"error";
 }
}
}
}
?>  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>BOOK TURF</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<style>
    
   
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

  
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="index.html">TURF MANAGEMENT SYSTEM</a></h1>
        <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="customer_home.php">Home</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
          <li><a class="getstarted scrollto" href="customer_turfview.php">Back</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container">
        <form method="POST">
            <center>
            <div class="card"  style="width:25%">
            <?php
            while($row=mysqli_fetch_assoc($result))
            {

            ?>
        <div class="form-group mt-4"> 
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
            <?php echo "Turf_AMOUNT: " .$row['Amount'];?>
        </div>

        <div class="form-group mt-4">
             <label for=""> from date</label>
             <input type="date" name="fromdate" placeholder="enter from date">
        </div>
        <div class="form-group mt-4">
             <label for=""> Todate</label>
             <input type="date" name="todate" placeholder="enter to date">
        </div>
        <div class="form-group mt-4">
            <button type="submit" class="btn"name="submit" style="background-color: blue; padding-left: 25px;">Book Now</button>
        </div>
    
      </div>
      </center>
      </div>
     
 
            </div>
</form>
    </div>
    <?php}?>
        
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