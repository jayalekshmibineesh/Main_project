<?php
session_start();
include 'connection.php';
$id1=$_GET['id'];
$data=mysqli_query($con,"SELECT * FROM `customer_registration` WHERE  Customer_id='$id1'");
$row=mysqli_fetch_assoc($data);

if(isset($_POST['submit']))
{
  $customername=$_POST['customer_name'];
  $email=$_POST['email'];
  $address=$_POST['address'];

  $contact=$_POST['contact'];
  $DOB=$_POST['dob'];
  
//   $pic = $_FILES['f1']['name'];

// if($pic != "") {
//     $filearray = pathinfo($_FILES['f1']['name']);
//     $file1 = rand();
//     $file_ext = $filearray["extension"];
//     $filenew = $file1 . "." . $file_ext;
    
//     $allowed_types = array('jpg', 'jpeg', 'png', 'gif');
//     $max_size = 500; 
    
//     // Check file type and size
//     if(in_array(strtolower($file_ext), $allowed_types) && $_FILES['f1']['size'] <= $max_size) {
//         move_uploaded_file($_FILES['f1']['tmp_name'], "images/" . $filenew);
//     }
//     else {
//         echo "<script> alert('Invalid file type or size. Please try again.')</script>";
//     }
// }
// else {
//     echo "<script> alert('Please select a file to upload.')</script>";
// }

 $pic=$_FILES['f1']['name']; 
    if($pic!="")
    {

      $filearray=pathinfo($_FILES['f1']['name']);
      $file1=rand();
      $file_ext=$filearray["extension"];
      $filenew=$file1.".".$file_ext;
      move_uploaded_file($_FILES['f1']['tmp_name'],"images/".$filenew);
    }

  mysqli_query($con,"UPDATE `customer_registration` SET `Customer_name`='$customername',`Email`='$email',`Address`='$address',`Contact`='$contact',`DOB`='$DOB',`image`='$filenew' where Customer_id='$id1'");
  
  echo' <script> alert("updated Successfully")</script>';
  header('location:customer_profile.php');

}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>CUSTOMER PROFILE EDIT</title>
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
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="customer_profile.php">Back</a></li>
          <li><a class="nav-link scrollto" href="customer_home.php">Customerhome</a></li>
          <li><a class="getstarted scrollto" href="logout.php">Logout</a></li>
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
 <center> <div class="card" style="width:80%;">
            <form  action="" method="POST" enctype="multipart/form-data" required>  
                       <h2><center><span>CUSTOMER EDIT PROFILE</span></center></h2>          
                        <div  class="form-group">
                              <input  type="file"  id="imge"name="f1" class="form-control mt-2 mb-2"placeholer="Upload your profilepic" >
                              <span style="color: red;" id="sp9"></span><br>

                               <input type="text" id="c_name" class="form-control mt-2" placeholder="Your Name *" value="<?php echo $row['Customer_name'];?>" name="customer_name" onkeyup="clearmsg('sp1')" style="width:350px;">
                               <span style="color: red;" id="sp1"></span>
                          
                                <input type="text"id="email" class="form-control mt-2" placeholder="Email *" value="<?php echo $row['Email'];?>" name="email" onkeyup="clearmsg('sp2')"  style="width:350px;"> 
                                <span style="color: red;" id="sp2"></span>
                                                                                       
                          
                                <input type="text"id="address" class="form-control mt-2" placeholder="Your Address*" value="<?php echo $row['Address'];?>" name="address" onkeyup="clearmsg('sp4')"  style="width:350px;">
                                <span style="color: red;" id="sp4"></span>

                                <input type="text" id="contact" class="form-control mt-2" placeholder="Contact *" value="<?php echo $row['Contact'];?>" name="contact"  onkeyup="clearmsg('sp3')"  style="width:350px;">
                                <span style="color: red;" id="sp3"></span>
                            
                            
                                <input type="date" id="DOB" class="form-control mt-2" placeholder="Your Date of Birth" value="<?php echo $row['DOB'];?>" name="dob"onkeyup="clearmsg('sp5')" style="width:350px;"> 
                                <span style="color: red;" id="sp5"></span>                                                   
                               
                                <!-- <button name="submit"type="submit" class="btn btn-primary" onclick="return validation();return false;">Edit</button> -->
                                <button class="btn btn-primary mb-2" name="submit" onclick="return validation();">Update</button>                              
                               
                           </div>
                              <br>                           
                            </form>
                        </div></center>
                   </div>
                </div>
           </div>
      
  </section><!-- End Hero -->
 
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
        var c_name=document.getElementById("c_name").value;
        var email=document.getElementById("email").value;
        var contact=document.getElementById("contact").value;
        var address=document.getElementById("address").value;
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
       
      // return true;
    }  
      function clearmsg(sp)
        {  
           document.getElementById(sp).innerHTML="";
        }

</script> 
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
 </body>
</html>
