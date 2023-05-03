<?php
session_start();
include 'connection.php';
if(!isset($_SESSION['id']))
{
    header('location:login.php');
}
else
{
$id1=$_SESSION['id'];
//$sql1=mysqli_query($con,"SELECT turf.Amount from turf inner join bookturf where turf.Turf_id=bookturf.Turf_id");
 $sql1=mysqli_query($con,"SELECT turf.Amount, bookturf.Booking_id, bookturf.Customer_id FROM turf INNER JOIN bookturf ON turf.Turf_id=bookturf.Turf_id WHERE Customer_id='$id1'order by Booking_id desc");
 $row=mysqli_fetch_assoc($sql1);
if(isset($_POST['submit']))
{
    $id1=$_SESSION['id'];
    $status=$_POST['status'];
    $amount=$_POST['amount'];
    $Booking_id=$_SESSION['Booking_id'];
    mysqli_query($con,"INSERT INTO `payment`( `Customer_id`, `Booking_id`, `Amount`, `Status`) VALUES ('$id1','$Booking_id','$amount','$status')");
    $pay=mysqli_insert_id($con);
    $result=mysqli_query($con,"UPDATE `bookturf` SET `Payment_id`='$pay' WHERE `Customer_id`='$id1'AND `Booking_id`='$Booking_id'");
    if($result)
    {
        echo "<script>alert( 'Booking successfull')</script>";
       // header('location:customer_turfview.php');
    
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PAYMENT</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<style>
.card{
    background-image: url('https://mdia.istockphoto.com/id/1130905980/photo/universal-grass-stadium-illuminated-by-spotlights-and-empty-green-grass-playground.jpg?b=1&s=170667a&w=0&k=20&c=7t-jHN-NyuCMH2S9BwUGmQBjbMZaRCykeG86n1PYaD0=');
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

  </head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">TURF MANAGEMENT SYSTEM</a></h1>
        <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li>
          <li><a class="getstarted scrollto" href="bookturf.php">Back</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
          <div class="card" style="background-color: green;">
          <form action="" method="POST">

            <center>
              <h3>Make payment</h3>
              <input type="text" name="amount" value="<?php echo $row["Amount"];?>">
            <P>Status:</P>
            <input type="radio" id="radio" name="status" value="paid">paid
            <input type="radio" id="radio"name="status" value="unpaid">unpaid <br>
            <input class="btn btn-primary" type="submit" name="submit" value="submit" >
            </center>
          </form>
        </div>
       </div>
        </div>
        
         
        </div>
      </div>
    </div>

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