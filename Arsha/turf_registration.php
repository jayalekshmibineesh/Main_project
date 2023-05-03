<?php
session_start();
include 'connection.php';
if(isset($_POST['submit']))
{
  $turfname=$_POST['turf_name'];
  $turfplace=$_POST['place'];
  $amount=$_POST['amount'];
  $id1=$_SESSION['id'];
  
   $pic=$_FILES['f1']['name'];
  if($pic!="")
  {

    $filearray=pathinfo($_FILES['f1']['name']);
    $file1=rand();
    $file_ext=$filearray["extension"];
    $filenew=$file1.".".$file_ext;
   move_uploaded_file($_FILES['f1']['tmp_name'],"images/".$filenew);
  }
  else
  {
     echo"<script> alert('try again please')</script>";
  }
 
  $sql=mysqli_query($con,"INSERT INTO turf(Turf_name,Turf_place,Image,Amount,Owner_id) VALUES('$turfname','$turfplace','$filenew','$amount','$id1')");
   if($sql)
  {
  
    header('location:turf_registration.php');
   echo'<script> alert("Reistered Succesfully");</script>';
   //mysql1_close($con);
   
   ?>
   <script>window.location.assign('turf_registration.php');</script>  
  <?php

  }
 else
{
   echo "somethpng went wrong";
   
  }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <style>
      body
      {
        color:white;
      }
        .contact{
            padding-left:12cm;
            left:30%;
            padding-top:40px;
        }
        .section-title{
          padding-right:100px;
          right:50%;
        }
        span{
          color:pink;
        }

        </style>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TURF MANAGEMENT SYSTEM</title>
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

  </head>

<body>
 
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">TURF MANAGEMENT SYSTEM </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="Ownerturf_view.php"> Turf</a></li>
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>
          <!-- <li><a class="nav-link scrollto" href="">Register</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<!-- 
  ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-right">

    <div class="container">
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="300">
      <form  action="" method="POST" enctype="multipart/form-data" required>  
            <h2><center><span>TURF REGISTRATION</span></center></h2>          
                            <div class="form-group">
                               
                                <input type="text" id="tuff_name"class="form-control mt-1" placeholder="Your Name *" value="" name="turf_name" onkeyup="clearmsg('sp1')" style="width:350px;">
                                <span style="color: red;" id="sp1"></span>
                                
                          
                            
                                <input type="text"id="T_place" class="form-control mt-2" placeholder="place *" value="" name="place" onkeyup="clearmsg('sp2')"  style="width:350px;"> 
                                <span style="color: red;" id="sp2"></span>
                            
                            
                                <input type="text" id="amount" class="form-control mt-2" placeholder="amount *" value="" name="amount"  onkeyup="clearmsg('sp3')"  style="width:350px;">
                                <span style="color: red;" id="sp3"></span>
  
                                
                            
                                <input type="file"id="payment" class="form-control mt-2" placeholder="payment*" value="" name="f1" onkeyup="clearmsg('sp4')"  style="width:350px;">
                            
                                <button name="submit" class="btn btn-primary" onclick="return validation();return false;">SUBMIT</button>
                            
                               
                              </div>
                              <br>                       
                           </form>
                         </div>      
                      </div>
                   </section>
                            
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
        var T_name=document.getElementById("tuff_name").value;      
        var T_place=document.getElementById("T_place").value;
        var amount=document.getElementById("amount").value;
             
     if (T_name=="")
      {
        document.getElementById("sp1").innerHTML="Enter your Turf Name";
        return false;
      }  
      
      if (T_place=="")
      {
        document.getElementById("sp2").innerHTML="Enter your Turf place";
        return false;
      }
      if (amount =="")
      {
        document.getElementById("sp3").innerHTML="Enter Amonunt";
        return false;
      }
      
       return true;
      }
        
      function clearmsg(sp)

{  
document.getElementById(sp).innerHTML="";
}

</script> 
 <!-- ======= Footer ======= -->
  <br><footer id="footer">

<
<div class="container footer-bottom clearfix">
  <div class="copyright">
    &copy; Copyright <strong><span>Arsha</span></strong>. All Rights Reserved
  </div>
  <div class="credits">
   
    Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
  </div>
</div>
</footer><!-- End Footer -->


</body>

</html>