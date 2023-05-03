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

$sql=mysqli_query($con,"SELECT bookturf.Booking_id,bookturf.From_Date,bookturf.To_Date,turf.Turf_name,customer_registration.Customer_name,customer_registration.Contact,payment.Amount,payment.Status FROM bookturf
INNER JOIN `customer_registration`ON `bookturf`.`Customer_id`=`customer_registration`.`Customer_id`
INNER JOIN turf on bookturf.Turf_id=turf.Turf_id 
INNER JOIN payment on bookturf.Payment_id=payment.Payment_id WHERE Owner_id='$id1'");

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
  table,tr,th,td
  { border: 2px solid black;
    border-collapse:collapse;
    background-color:red; 
  }
    td,th
    {
        color:black;    

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
        <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="logout.php">logout</a></li>
          <li><a class="nav-link scrollto" href="owner_home.php">back</a></li>
          
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
         
          <h2>Owner turf booking details view </h2>
         <center><table class="table table-bordered">
                    <tr>
                       <th> Booking_id</th>
                       <th>Turf_Name</th>
                       <th>From_Date</th>
                       <th>To_Date</th>
                       <th>Customer_Name</th>
                       <th>Customer_Contact</th>
                       <th>Amount</th>
                       <th>Payment_Status</th>
                    </tr><?php
                    while($row=mysqli_fetch_assoc($sql))
                    {
                   
                    ?> 
                    <tr>
                        <td><?php echo $row['Booking_id'];?></td>
                        <td> <?php echo $row['Turf_name'];?></td>
                        <td> <?php echo $row['From_Date'];?></td>
                        <td> <?php echo $row['To_Date'];?></td>
                        <td> <?php echo $row['Customer_name'];?></td>
                        <td> <?php echo $row['Contact'];?></td>
                        <td> <?php echo $row['Amount'];?></td>
                        <td> <?php echo $row['Status'];?></td>

                    </tr>
               <?php
                   }
                ?>
                  


                 </table>
        </center> 
         
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