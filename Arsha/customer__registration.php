<?php
include 'connection.php';

if(isset($_POST['submit']))
{
  $customername=$_POST['customer_name'];
  $email=$_POST['email'];
  $address=$_POST['address'];
 // $gender=$_POST['gender'];
  $contact=$_POST['contact'];
  $dob=$_POST['dob'];
  $password=$_POST['password'];
  $unencrypted_password="$password";
  $hash=password_hash($unencrypted_password,PASSWORD_DEFAULT);
  $username=$_POST['email'];
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
 
  mysqli_query($con,"INSERT INTO customer_registration(Customer_name,Email,Address,Contact,DOB,approval_status,image) VALUES('$customername','$email','$address','$contact','$dob', '0','$filenew')");
  $log=mysqli_insert_id($con);
  $sql=mysqli_query($con,"INSERT INTO login(login_id,username,Password,type) VALUES('$log','$username','$hash','customer')");
  if($sql)
  {
   echo'<script> alert("Registered Succesfully");</script>';


   //mysql1_close($con);
   
   ?>
   <script>window.location.assign('customer__registration.php');</script>  
  <?php

  }
 else
{
   echo "something went wrong";
   
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
          <li><a class="nav-link scrollto" href="login.php">Login</a></li>
          <li><a class="nav-link scrollto" href="customer__registration.php">Register</a></li> 
          <!-- <li><a class="nav-link scrollto" href="#">Register</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<!-- 
  ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-right">

  <div class="container" data-aos="fade-up" style="background-color:grey; width:450px; margin-left:300px;float:left" >
   <div class="row">
    <div class="col-mb-4"style="text-align:center;" >
            <h3> <center><span>CUSTOMER REGISTRATION</span></center></h3>
              <form  action="" method="POST" enctype="multipart/form-data"  required >  
                    
                       <div class="form-group">  
                            <input type="text" id="c_name"class="form-control mt-2" placeholder="Your Name *" value="" name="customer_name" onkeyup="clearmsg('sp1')" style="width:350px;">
                             <span style="color: red;" id="sp1"></span>
                                                                                     
                                <input type="text"id="email" class="form-control mt-1" placeholder="Email *" value="" name="email" onkeyup="clearmsg('sp2')" style="width:350px;"> 
                                <span style="color: red;" id="sp2"></span>
                            
                            
                                <input type="text"id="contact" class="form-control mt-1" placeholder="contact *" value="" name="contact" onkeyup="clearmsg('sp3')"style="width:350px;"> 
                                <span style="color: red;" id="sp3"></span>

                          
                                <input type="text"id="address" class="form-control mt-2" placeholder="Your Address*" value="" name="address" onkeyup="clearmsg('sp4')"  style="width:350px;">
                                <span style="color: red;" id="sp4"></span>                            
                            
                                <input type="date"id="Dob" class="form-control mt-1" placeholder="Your Date of Birth" value="" name="dob"onkeyup="clearmsg('sp5')" style="width:350px;"> 
                                <span style="color: red;" id="sp5"></span>
                                             
                                <input type="text"id="username" class="form-control mt-1" placeholder="Your username" value="" name="username"onkeyup="clearmsg('sp6')"  style="width:350px;"> 
                                <span style="color:red;" id="sp6"></span>
                                                                           
                                <input type="password" id="password"class="form-control mt-1" placeholder="Your Password *" value="" name="password" onkeyup="clearmsg('sp7')" style="width:350px;">
                                <span style="color: red;" id="sp7"></span>
                                                        
                               <input  type="file"  id="image"name="f1" class="form-control mt-2 mb-2"placeholder="Upload your profilepic" >
                                <span style="color: red;" id="sp9"></span><br>

                            <button class="btn btn-primary mb-2"  name="submit" onclick="return validation();">SUBMIT</button>                              
                        </div>                                       
                     </form>
                   </div>
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
        var c_name=document.getElementById("c_name").value;
        var email=document.getElementById("email").value;
        var contact=document.getElementById("contact").value;
        var address=document.getElementById("address").value;
        var username=document.getElementById("username").value;
        var password=document.getElementById("password").value;
        if (c_name=="")
         {
          document.getElementById("sp1").innerHTML="Enter your Name";
           return false;
         }
          if (email=="")
          {
           document.getElementById("sp2").innerHTML="Enter email";
           return false;
           
          }
          if (contact=="")
          {
           document.getElementById("sp3").innerHTML="Enter contact";
           return false;
           
          }

          if (address=="")
      {
        document.getElementById("sp4").innerHTML="enter your address";
        return false;

      }     
     
       if ( username =="")
       {
        document.getElementById("sp6").innerHTML="Enter your username";
        return false;
       }
       if ( password=="")
       {
        document.getElementById("sp7").innerHTML="Enter your Password";
        return false;
       }
      
       //return true;
      }
       
      function clearmsg(sp)

{  
document.getElementById(sp).innerHTML="";
}

  </script>

  <!-- <script>
    function validation()
    { 
        var c_name=document.getElementById("c_name").value;      
        var email=document.getElementById("email").value;
        var address=document.getElementById("address").value;
        var contact=document.getElementById("contact").value;
        var dob=document.getElementById("dob").value;
        var username=document.getElementById("username").value;
        var password=document.getElementById("password").value;
        var gender=document.getElementById("gender").value;
        var image=document.getElementById("image").value;
        
     if (c_name=="")
      {
        document.getElementById("sp1").innerHTML="Enter your Name";
        return false;
      }
      if (email=="")
      {
        document.getElementById("sp2").innerHTML="Enter your email";
        return false;
      }
      if (contact =="")
      {
        document.getElementById("sp3").innerHTML="Enter your Contact number";
        return false;
      }
      if (address=="")
      {
        document.getElementById("sp4").innerHTML="enter your address";
        return false;

      }     
      if (dob =="")
      {
      document.getElementById("sp5").innerHTML=" Enter your Date of birth";
      return false;
      }
       if ( username =="")
       {
        document.getElementById("sp6").innerHTML="Enter your username";
        return false;
       }
       if ( password=="")
       {
        document.getElementById("sp7").innerHTML="Enter your Password";
        return false;
       }
       if ( gender=="")
       {
        document.getElementById("sp8").innerHTML="Enter your gender";
        return false;
       }
       if ( image=="")
       {
        document.getElementById("sp9").innerHTML="upload the image";
        return false;
       }
        return true;
      }
    
      function clearmsg(sp)
    {  
        document.getElementById(sp).innerHTML="";
    }

</script>  -->
 <!-- ======= Footer ======= -->
  <br><footer id="footer">

<!-- <div class="footer-newsletter"> -->
  <!-- <div class="container"> -->
    <!-- <div class="row justify-content-center">
      <div class="col-lg-6">
        <h4>Join Our Newsletter</h4>
        <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna</p>
        <form action="" method="post">
          <input type="email" name="email"><input type="submit" value="Subscribe">
        </form>
      </div>
    </div>
  </div>
</div>

<div class="footer-top">
  <div class="container">
    <div class="row">

      <div class="col-lg-3 col-md-6 footer-contact">
        <h3>Arsha</h3>
        <p>
          A108 Adam Street <br>
          New York, NY 535022<br>
          United States <br><br>
          <strong>Phone:</strong> +1 5589 55488 55<br>
          <strong>Email:</strong> info@example.com<br>
        </p>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Useful Links</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Services</h4>
        <ul>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Web Design</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Web Development</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Product Management</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Marketing</a></li>
          <li><i class="bx bx-chevron-right"></i> <a href="#">Graphic Design</a></li>
        </ul>
      </div>

      <div class="col-lg-3 col-md-6 footer-links">
        <h4>Our Social Networks</h4>
        <p>Cras fermentum odio eu feugiat lide par naso tierra videa magna derita valies</p>
        <div class="social-links mt-3">
          <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
          <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
          <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
          <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
          <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
        </div>
      </div>

    </div>
  </div>
</div> -->

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