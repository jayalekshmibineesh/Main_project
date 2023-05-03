<?php
session_start();
include 'connection.php';
$id=$_GET['id'];
$id1=$_SESSION['id'];
$sql=mysqli_query($con,"DELETE FROM `notification` WHERE Customer_id='$id1'AND Notification_id='$id'");
if($sql)
{
    echo"<script>alert('notification deleted')</script>";
    header('location:customer_notification.php');
}
else{
    echo"error";
}
?>