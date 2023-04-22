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
<section class="vh-100" style="background-color: #508bfc;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card shadow-2-strong" style="border-radius: 1rem;">
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
              <input type="email"name="username" class="form-control form-control-lg" />
              <label class="form-label" for="typeEmailX-2" >Email</label>
            </div>

            <div class="form-outline mb-4">
              <input type="password" id="typePasswordX-2"  name="password" class="form-control form-control-lg" />
              <label class="form-label" for="typePasswordX-2">Password</label>
            </div>


            
            <!-- Checkbox -->
            
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Login</button>

            <hr class="my-4">

            <button class="btn btn-lg btn-block btn-primary mb-2" style="background-color:skyblue; color:white;"
              type="submit" ><a href="customer__registration.php">user registration</a></button>

            <button class="btn btn-lg btn-block btn-secondary mb-2" style="background-color: skyblue;"
              type="submit"><a href="owners  _reg.php"></i>Owner registration</a></button>
              </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </body>
  </html>