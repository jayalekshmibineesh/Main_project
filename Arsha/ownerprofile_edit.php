<?php
session_start();
include 'connection.php';
$id1=$_SESSION['id'];
$data=mysqli_query($con,"SELECT * FROM `owner_registration` WHERE Owner_id='$id1'");
$row=mysqli_fetch_assoc($data);
if(isset($_POST['submit']))
{
 $owner_name= $_POST['owner_name'];
 $address=$_POST['address'];
 $email=$_POST['email'];
 $contact=$_POST['contact'];
 $pic=$_FILES['f1']['name'];
    if($pic!="")
    {

      $filearray=pathinfo($_FILES['f1']['name']);
      $file1=rand();
      $file_ext=$filearray["extension"];
      $filenew=$file1.".".$file_ext;
      move_uploaded_file($_FILES['f1']['tmp_name'],"images/".$filenew);
    }
mysqli_query($con,"UPDATE owner_registration SET `Owner_name`='$owner_name',`Address`='$address',`Email`='$email',`Contact`='$contact',`Image`='$filenew' WHERE Owner_id='$id1'");
}
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
          <li><a class="nav-link scrollto active" href="owner_home.php">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php">home</a></li>
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
          <div class="container" data-aos="fade-up" style="background-color:grey; width:450px; margin-left:300px;float:left">
            <div class="row">
              <div class="col-mb-4">
          <h4><center><span>OWNERS PROFILE UPDATE</span></center></h4><br>
                  <form  action="" method="POST" enctype="multipart/form-data" required>            
                            <div class="form-group">
                               <input  type="file" id="imge"name="f1" class="form-control mt-2 mb-2"placeholer="Upload your profilepic">

                                <input type="text" id="c_name"class="form-control mt-2" placeholder="Your Name *" value="<?php echo $row['Owner_name'];?>" name="owner_name" onkeyup="clearmsg('sp1')" style="width:350px;">
                                <span style="color: red;" id="sp1"></span>
                                                           
                                <input type="text"id="email" class="form-control mt-2" placeholder="Email *" value="<?php echo $row['Email'];?>" name="email" onkeyup="clearmsg('sp2')"  style="width:350px;"> 
                                 <span style="color: red;" id="sp2"></span>
                                                        
                                <input type="text" id="contact" class="form-control mt-2" placeholder="Contact *" value="<?php echo $row['Contact'];?>" name="contact"  onkeyup="clearmsg('sp3')"  style="width:350px;">
                                <span style="color: red;" id="sp3"></span>
                                                      
                                <input type="text"id="address" class="form-control mt-2" placeholder="Your Address*" value="<?php echo $row['Address'];?>" name="address" onkeyup="clearmsg('sp4')"  style="width:350px;">
                                <span style="color: red;" id="sp4"></span>                    
                             </div>
                               <!-- <input type="submit" class="btn btn-primary" name="submit"  value="Submit">      -->
                               <button name="submit"type="submit" class="btn btn-primary" onclick="return validation();return false;">update</button>
                            </form>
                         </div>
                       </div>
                    </div>           
          </section><!-- End Hero -->
                           
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
       
       return true;
      }
       
      function clearmsg(sp)
       {  
         document.getElementById(sp).innerHTML="";
        }

     </script>       
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
 
</body>

</html>