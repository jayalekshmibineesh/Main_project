<?php
session_start();
include 'connection.php';
    $id1=$_SESSION['id'];
    $data=mysqli_query($con,"SELECT * FROM `login`WHERE login_id='$id1'");
    $row=mysqli_fetch_assoc($data);
    if(isset($_POST['submit']))
    {
        $password=$_POST['old_password'];
        $newpassword=$_POST['new_password'];
        $hash=password_hash($newpassword,PASSWORD_DEFAULT);
        if(password_verify($password,$row['password']))
        {
            $sql=mysqli_query($con,"UPDATE login SET password= '$hash' where login_id='$id1'");
            if($sql)
            {
                echo'<script> alert("Password Updated")</script>';
                header('location:changepassword.php'); 
            }
            else
            {
                echo'error in updating password:';
            }
        }
        else{
            echo " old password doesnot match,please try again";
        }
    }

$con->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CHANGE PASSWORD</title>
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
      
      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="logout.php">Logout</a></li>
          <li><a class="getstarted scrollto" href="adminhome.php">Home</a></li>
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
          
        </div>
        <form action="" method="POST">
            <div class="card" style="width:40%;background-color:grey">
            <h2><span>CHANGE PASSWORD</span></h2>
            <label for="current_password"> current password</label>
            <input type="text" name="old_password" id="oldpassword" onkeyup="clearmsg('sp1')">
            <span id="sp1" style="color:red"></span>
            <br>
            <label for="">New password</label>
            <input type="password" name="new_password"id="newpassword" onkeyup="clearmsg('sp2')">
            <span id="sp2" style="color:red"></span> <br>
            
            <input type="submit" name="submit" value="submit" onclick="return validation();"> <br>
        </div>
        </form>
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
  <script>
    function validation()
    {       
        var oldpassword=document.getElementById("oldpassword").value;
        var newpassword=document.getElementById("newpassword").value;
     
       if ( oldpassword =="")
       {
        document.getElementById("sp1").innerHTML="Enter your oldpassword";
        return false;
       }
       if ( newpassword=="")
       {
        document.getElementById("sp2").innerHTML="Enter your NewPassword";
        return false;
       }
      
       //return true;
      }
       
      function clearmsg(sp)

{  
document.getElementById(sp).innerHTML="";
}
</script>

</body>

</html>