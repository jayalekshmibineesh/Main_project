
<?php
session_start();
include 'connection.php';
$data=mysqli_query($con,"select * from customer_registration");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CUSTOMERS VIEW</title>
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
        table,tr,th,td
        {
            border:2px solid black;
            /* border-collapse:collapse; */
        }
        th,tr,td{
         color:white; 
        }

            .btn1{
                background-color:blue;
                color:white;
            }
            .nova{
              padding-top:4cm;
              
            }
            span{
              color:pink
            }
        
    </style>

</head>

<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
  <!-- ======= Header ======= -->
  <section id="hero">
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">TURF MANAGEMENT</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">Feedbak</a></li>
          <li><a class="nav-link scrollto" href="#services">notification</a></li>
          <!-- <li><a class="nav-link   scrollto" href="#portfolio">search</a></li> -->
          <li><a class="nav-link scrollto" href="customer__registration.php">register</a></li>
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>

          
          <li><a class="nav-link scrollto" href="login.php">Logout</a></li> 
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  

  <!-- ======= Hero Section ======= -->

<div class="nova">
<h2><center><span>CUSTOMERS VIEW</span></center></h2><br> 
  <center>
  <table>
        <tr>
            <th>CustomerName</th>
            <th>Gender</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact</th>
            <th>DOB</th>
            <th>Image</th>
            <th >aprooval</th>
            
            
            
        </tr>

        <?php
        
         while($row= mysqli_fetch_assoc($data))
         {
        ?>
       

         <tr>
          <td><?php echo $row['Customer_name'];?></td>
          <td><?php echo $row['gender'];?></td>
          <td><?php echo $row['Email'] ;?></td>
          <td><?php echo $row['Address'];?></td>
          <td><?php echo $row['Contact'] ;?></td> 
          <td><?php echo $row ['DOB'];?></td>
          <td><img src="./images/<?php echo $row['image'];?>" height="20" width="20" alt="image not found"></td>
          
          <td>
          <?php
          if($row['approval_status']==0)
          {
            ?>        
         <a class="btn btn-primary" href="updatecust_status.php?id=<?php echo $row['Customer_id'];?>">approve</a>
<?php
}
elseif($row['approval_status']==1)
{
    ?>
    <button class="btn btn-danger">approved</button>  
    <?php
}
            
?>
</td>

        </tr>
         
      <?php
       }
       ?>

   </table></center>
      </div>
  </section><!-- End Hero -->
  <main id="main">
  <form method="post">
    <br><br>
  <</form>
  
  </main><!-- End #main --><!-- ======= Footer ======= -->
    
  <footer id="footer">
   
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
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
