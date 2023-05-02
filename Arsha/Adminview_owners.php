<?php
include 'connection.php';
$data=mysqli_query($con,"select * from owner_registration");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>OWNERS VIEW</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
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
  <style>
        table,tr,th,td
        {
            border:2px solid black;
            border-collapse:collapse;
        }
tr,th,td{
  color:white;
}
            .btn1{
                background-color:blue;
                color:white;
            }
            span{
                color:pink
            }
        .top{
          padding-bottom:25px;
        }
      .table
      {
        margin-top:50px;
      }
    </style>

</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
<!-- ======= Header ======= -->

<section id="hero" >
  <div class="top">
<header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">TURF MANAGEMENT SYSTEM </a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto active" href="index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          
          
          <li><a class="nav-link scrollto" href="logout.php">logout</a></li>

          <li><a class="nav-link scrollto" href="">Register</a></li> 
         
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
          </div>
    </div>
  </header><!-- End Header -->
  <!-- <section id="hero" class="d-flex align-items-right">

    <div class="container">
      <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="300">
        -->
            <!-- <h2><center><span>CUSTOMER REGISTRATION</span></center></h2>           -->
  
  
  
        <h2><center><span>OWNERS VIEW</span></center></h2><br>  
          
        
        <center>
    <table style="padding-bottom:250px;">
        <tr>
            <th>OwnerName</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact</th>
            <th> Image</th>
            <th> Approval</th>
                    
        </tr>

        <?php
        
         while($row= mysqli_fetch_assoc($data))
         { 
        ?>
         <tr>
          <td><?php echo $row['Owner_name'];?></td>
          <td><?php echo $row['Email'] ;?></td>
          <td><?php echo $row['Address'];?></td>
          <td><?php echo $row['Contact'] ;?></td>
          <td> <img src="./images/<?php echo $row['Image'];?>" alt="image notfound" height="40" width="40"></td>
          <td><?php echo $row['approval_status'];?>
          
          <?php
          if($row['approval_status']==0)
           {
            ?>        
         <a class="btn btn-primary" href="updateown_status.php?id=<?php echo $row['Owner_id'];?>">approve</a>
           <?php
           }
            elseif($row['approval_status']==1)
             {
            ?>
               <button class="btn btn-danger">approved</button>  
            <?php
             }
            
            ?>
         </td>
        </tr>
         
      <?php
       }
       ?>

   </table>
   </center>
      </section>
   <!-- </div>
      </div>
      </section> -->

        
        
    
  
    <!-- ======= Footer ======= -->
  <br><footer id="footer">


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