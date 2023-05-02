<?php
include 'connection.php';
  $data=mysqli_query($con,"select * from turf");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- <style>
        table,tr,th,td
            {
            border: 2px solid black;
            border-collapse:collapse;
            width: 50%;
            }
              tr,th,td{
                        color:white;
                      }  -->
                     <style>  
    table , tr,td,th{
    border: 2px solid black;
    border-collapse: collapse;
    width: 50%;
  }
  
  th, td {
    
    padding: 8px;
    text-align: left;
    color:white;
  }
  
  th {
    background-color:green;
  }
</style> 
<!-- /* body 
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
        }  */  -->

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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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
          <li><a class="nav-link scrollto active" href="ownerhome.php">Home</a></li>
          
          <li><a class="nav-link scrollto" href="logout.php">Logout</a></li> 
          <!-- <li><a class="nav-link scrollto" href="#">Register</a></li> -->
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
<!-- 
  ======= Hero Section ======= -->
  <section id="hero">
  <h2><center><span> OWNERS TURF VIEW</span></center></h2><br>  
 
 <center>
<table class="table-bordered">
  <!-- <thead> -->
    <tr>
      <th>Turf Name</th>
      <th>Turf Place</th>
      <th>Image</th>
      <th>Amount</th>
    </tr>
  <!-- </thead> -->
  <!-- <body> -->
    <?php while($row = mysqli_fetch_assoc($data)) { ?>
      <tr>
        <td><?php echo $row['Turf_name']; ?></td>
        <td><?php echo $row['Turf_place']; ?></td>
        <td><img src="./images/<?php echo $row['Image']; ?>" alt="image not found" height="40" width="40"></td>
        <td><?php echo $row['Amount']; ?></td>
      </tr>
    <?php } ?>
  <!-- </tbody> -->
</table>
</center> 
          
        
                  </section>
       
                            
  <!-- Vendor JS Files -->
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/waypoints/noframework.waypoints.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script> 
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
 
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
  <br><footer id="footer">


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