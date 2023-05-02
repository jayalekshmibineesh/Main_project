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
//$row=mysqli_fetch_assoc($data);//fetching  data to  $row
$hash=password_verify($password,$row['password']);

$count=mysqli_num_rows($data);
$type=$row['type'];

if($count==1 && $type=="admin" && $hash==$password)
{
  
 $_SESSION['id']=$row['login_id'];
 
 $id=$row['login_id'];
 
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
  $_SESSION['id']=$row['login_id'];
  
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

  <title>LOGIN</title>
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
          
          <li><a class="getstarted scrollto" href="index.php">home</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">

  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem; margin: bottom 100px;">
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
              <input type="email"name="username"id="email" placeholder="Enter your username" class="form-control form-control-lg"onkeyup="clearmsg('sp1')" style="width:350px;">
              <span style="color: red;" id="sp1"></span>
              <!-- <label class="form-label" for="typeEmailX-2" >Email</label> -->
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="password"  name="password" class="form-control form-control-lg" placeholder="Enter your password" onkeyup="clearmsg('sp1')" style="width:350px;">
              <!-- <label class="form-label" for="typePasswordX-2">Password</label> -->
              <span style="color: red;" id="sp2"></span>
            </div>


            
            <!-- Checkbox -->
            
            <button class="btn btn-primary btn-lg btn-block p-1" type="submit" name="submit" onclick="return validation();">Login</button>

            <hr class="my-4">

  
             <a href="customer__registration.php" class="btn btn-lg btn-block btn-primary mb-2 p-1">user registration</a>
             <a href="owners  _reg.php"  class="btn btn-lg btn-block btn-primary mb-2 p-1"></i>Owner registration</a>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  </section><!-- End Hero -->

  <main id="main">

       
    
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



<!DOCTYPE html>
<html lang="en">
<head>
  <style>
    
    #button{
       padding:10px;
       border-radius:10px;
       background-color:skyblue;
    }
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-aFq/bzH65dt+w6FI2ooMVUpc+21e0SRygnTpmBvdBgSdnuTN7QbdgL+OapgHtvPp" crossorigin="anonymous">
  </head>
    <title>Document</title>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js" integrity="sha384-qKXV1j0HvMUeCBQ+QVp7JcfGl760yU08IQ+GpUo5hlbpg51QRiuqHAJz8+BrxE/N" crossorigin="anonymous"></script>
<script>
    function validation()
    {       
        var username=document.getElementById("email").value;
        var password=document.getElementById("password").value;
     
       if ( username =="")
       {
        document.getElementById("sp1").innerHTML="Enter your username";
        return false;
       }
       if ( password=="")
       {
        document.getElementById("sp2").innerHTML="Enter your Password";
        return false;
       }
      
       //return true;
      }
       
      function clearmsg(sp)

{  
document.getElementById(sp).innerHTML="";
}

  </script>

  
  
</section>
  </body>
  </html>