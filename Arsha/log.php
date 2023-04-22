

<?php

session_start();
include 'connection.php';
if(isset($_POST['submit']))// condition to check when the button is clicked
{ 
  $username=$_POST['username'];
  $password=$_POST['password'];
 
  
$data=mysqli_query($con,"SELECT * FROM `login` WHERE username='$username'");
$row=mysqli_fetch_assoc($data);
if($data)
{
// $row=mysqli_fetch_assoc($data);//fetching  data to  $row
$hash=password_verify($password,$row['password']);
// var_dump($row['password']);
$count=mysqli_num_rows($data);
$type=$row['type'];

if($count==1 && $type=="admin" && $hash==$password)
{
 $_SESSION['id']=$_row['login_id'];
 $id=$_SESSION['id'];
 
  header("location:adminhome.php");
 }
elseif($count==1 && $type=="customer" && $hash==$password)
 {
  $_SESSION['id']=$row['login_id'];
  $id=$_SESSION['id'];
  $qua=mysqli_query($con,"SELECT `approval_status` FROM `customer_registration`WHERE Customer_id ='$id'");
  $row1=mysqli_fetch_assoc($qua);
 if ($row1['approval_status']==1)
 {
 
  header("location:customer_home.php");
 }
 else
 {
  echo "You Need Admin Approval";
 }
 
}
elseif($count==1 && $type=="owner" && $hash==$password)
 {
  $_SESSION['id']=$row1['login_id'];
  $id=$_SESSION['id'];
  $qua=mysqli_query($con,"SELECT `approval_status` FROM `owner_registration`WHERE Owner_id ='$id'");
  $row1=mysqli_fetch_assoc($qua);
 if ($row1['approval_status']==1)
 {
 
  header("location:owner_home.php");
 }
 else
 {
  echo "You Need Admin Approval";
 }
}
else
{
echo "invalid id or password";

}
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>LOGIN PAGE</title>
  <style>
    
    #button{
       padding:10px;
       border-radius:10px;
       background-color:skyblue;
    }
    </style>
  
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
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Get Started</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
  <section id="hero" class="d-flex align-items-center">

    <!-- <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200"> -->
        <!-- <section class="vh-100" style="background-color: #508bfc;"> -->
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem; padding-bottom:500px;">
          <div class="card-body p-5 text-center">
            <form action="" method="POST">

            <h3 class="mb-5">Sign in</h3>
            <div class="form-outline mt-2 mb-2" >
              <select name="type" id="button">
                <option value="owner">&nbsp;Owner</option>
                <option value="customer">&nbsp; customer</option>
                <option value="admin"> &nbsp;admin</option>

              </select>
              </div>

            <div class="form-outline mb-4">
              <input type="email"name="username" class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2" >Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2"  name="password" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>


            
            <!-- Checkbox -->
            
            <button class="btn btn-primary btn-lg btn-block" type="submit"name="submit">Login</button>

            <hr class="my-4">

            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color:skyblue; color:white;"
              type="submit" ><a href="customer__registration.php">user registration</a></button>

            <button class="btn btn-lg btn-block btn-secondary mb-4" style="background-color: skyblue;"
              type="submit"><a href="owners  _reg.php"></i>Owner registration</a></button>
              </form>
          </div>
        </div>
      </div>
    </div>
</div>

    </div>
</div>
        
        
<!--          
        </div>
      </div>
    </div> -->

  </section><!-- End Hero -->

  <main id="main">

       
    <!-- ======= About Us Section ======= -->
    
    <!-- ======= Why Us Section ======= -->
   
    <!-- ======= Cta Section ======= -->

    <!-- ======= Portfolio Section ======= -->
    <!-- <section id="portfolio" class="portfolio"> -->
      <!-- <div class="container" data-aos="fade-up"> -->

       
    <!-- </section>End Portfolio Section -->

    <!-- ======= Team Section ======= -->
 

    <!-- ======= Pricing Section ======= -->
    

    <!-- ======= Frequently Asked Questions Section ======= -->
   

    <!-- ======= Contact Section ======= -->
    
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container footer-bottom clearfix">
      <div class="copyright">
        &copy; Copyright <strong><span>Futura</span></strong>. All Rights Reserved
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