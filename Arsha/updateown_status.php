<?php
include 'connection.php';

$id1=$_GET['id'];
//$data=mysqli_query($con,"UPDATE `owner_registration` SET `approval_status`='1' WHERE 'Owner_id'='$id1'");
mysqli_query($con,"UPDATE `owner_registration` SET `approval_status`='1' WHERE Owner_id='$id1'");
?>