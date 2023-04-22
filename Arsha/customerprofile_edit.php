<?php
session_start();
include 'connection.php';
$id1=$_GET['id'];
$data=mysqli_query($con,"SELECT * FROM `customer_registration` WHERE  Customer_id='$id1'");
$row=mysqli_fetch_assoc($data);
$gender=$_POST['gender'];
if(isset($_POST['submit']))
{
  $customername=$_POST['customer_name'];
  $email=$_POST['email'];
  $address=$_POST['address'];
  $gender=$_POST['gender'];
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

  mysqli_query($con,"UPDATE `customer_registration` SET `Customer_name`='$customername',`gender`='$gender',`Email`='$email',`Address`='$address',`Contact`='$contact',`DOB`='$DOB',`image`='$filenew' where Customer_id='$id1'");
  
 // echo' <script> alert(updated Successfully)</script>';

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
  <section id="hero" class="d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
       <div class="card" style="width=25%">
         <form  action="" method="POST" enctype="multipart/form-data" required>  
            <h2><center><span>CUSTOMER EDIT PROFILE</span></center></h2>          
                            <div class="form-group">
                            <input  type="file"  id="imge"name="f1" class="form-control mt-2 mb-2"placeholer="Upload your profilepic" >
                            <span style="color: red;" id="sp9"></span><br>
 
                                <input type="text" id="Customer_name"class="form-control mt-1" placeholder="Your Name *" value="<?php echo $row['Customer_name'];?>" name="customer_name" onkeyup="clearmsg('sp1')" style="width:350px;">
                                <span style="color: red;" id="sp1"></span>
                                
                          
                            
                                <input type="text"id="email" class="form-control mt-2" placeholder="Email *" value="<?php echo $row['Email'];?>" name="email" onkeyup="clearmsg('sp2')"  style="width:350px;"> 
                                <span style="color: red;" id="sp2"></span>
                                                                                       
                          
                                <input type="text"id="address" class="form-control mt-2" placeholder="Your Address*" value="<?php echo $row['Address'];?>>" name="address" onkeyup="clearmsg('sp4')"  style="width:350px;">
                                <span style="color: red;" id="sp4"></span>

                                <input type="text" id="contact" class="form-control mt-2" placeholder="Contact *" value="<?php echo $row['Contact'];?>>" name="contact"  onkeyup="clearmsg('sp3')"  style="width:350px;">
                                <span style="color: red;" id="sp3"></span>
                            
                            
                                <input type="date"id="DOB" class="form-control mt-2" placeholder="Your Date of Birth" value="<?php echo $row['DOB'];?>> "name="dob"onkeyup="clearmsg('sp5')" style="width:350px;"> 
                                <span style="color: red;" id="sp5"></span>                        

                               <input type="radio" style="color:white" name="gender" id="gender" value='male'<?php if($gender=='male') echo 'checked="checked"'?>>male
                               <input type="radio" style="color:white" name="gender"  id="gender" value='female'<?php if($gender=='Female') echo 'checked="checked"'?>>female  
                                <span style="color: red;" id="sp8"></span><br>

                               
                               

                                <button name="submit"type="submit" class="btn btn-primary" onclick="return validation();return false;">Edit</button>
                            
                               
                              </div>
                              <br>
                               <!-- <input type="submit" class="btn btn-primary" name="submit"  value="Submit">      -->
                            
                            </form>
       </div>
       
       </div>
       
    </div>


         </div>

          </div>
        </div>
        
         
        </div>
      </div>
    </div>

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
    <

    <!-- ======= Frequently Asked Questions Section ======= -->
   

    <!-- ======= Contact Section ======= -->
    <
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  
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
        var address=document.getElementById("address").value;
        var contact=document.getElementById("contact").value;
        var DOB=document.getElementById("DOB").value;
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
      if (DOB =="")
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

</script> 
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

 

</body>

</html>
