
<?php
session_start();
include 'connection.php';
$id=$_SESSION['id'];
$data="SELECT * FROM `owner_registration` WHERE Owner_id='$id'";
$result=mysqli_query($con,$data);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Owner profile</title>
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

      <h1 class="logo me-auto"><a href="index.php">TurfManagementSyatem</a></h1>
        <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">edit  profile</a></li>
          <li><a class="nav-link scrollto" href="#services"></a></li>
          <li><a class="nav-link   scrollto" href="#portfolio">change password</a></li>               
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
            <?php
              if(mysqli_num_rows($result)>0)
                {
                  while($row=mysqli_fetch_assoc($result))
                      { 
                        ?>
                          <div class="card" style="width=25%">
                               <div class="form-group mt-1">
                               <img src="./images/<?php echo $row['Image'];?>" height="50" width="50" alt="image not found">
                                  
                                </div>
                               <div class="form-group mt-4">
                                    <?php echo"Owner name :" .$row["Owner_name"]."<br>";?>
  </div>   
  <div class="form-group mt-4">
    <?php echo "Address :" .$row["Address"]."<br>";?>
 </div>

 <div class="form-group mt-4">
    <?php echo "Email :" .$row["Email"]."<br>";?>
 </div>
  <div class="form-group mt-4">
   <?php  echo "Contact :" .$row["Contact"]."<br>";?>
 </div>
 <a class="btn btn-primary" href="ownerprofile_edit.php?id=<?php echo $row['Owner_id']?>">edit</a> 
</div>
 <?php
 }
 }   
 else
 {
  echo "No results found." ;
 }
 mysqli_close($con);

?>    
      </div>
    </div>

  </section><!-- End Hero -->

  
  <!-- ======= Footer ======= -->
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