<!-- <script>
    function validation()
    { 
        var c_name=document.getElementById("c_name").value;      
        var email=document.getElementById("email").value;
        var address=document.getElementById("address").value;
        var contact=document.getElementById("contact").value;
        var dob=document.getElementById("dob").value;
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
      if (dob =="")
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

</script>  -->
<section>
<div class="nova">
<h2><center><span>CUSTOMERS VIEW</span></center></h2><br> 
  <center>
  <table>
        <tr>
            <th>CustomerName</th>
            <th>Email</th>
            <th>Address</th>
            <th>Contact</th>
            <th>DOB</th>
            <th>Image</th>
            <th >aprooval</th>
        </tr>
        <?php
          while($row= mysqli_fetch_assoc($data))
          {
        ?>
         <tr>
          <td><?php echo $row['Customer_name'];?></td>
          <td><?php echo $row['Email'] ;?></td>
          <td><?php echo $row['Address'];?></td>
          <td><?php echo $row['Contact'] ;?></td> 
          <td><?php echo $row ['DOB'];?></td>
          <td><img src="./images/<?php echo $row['image'];?>" height="50" width="50" alt="image not found"></td>
        <td>
          <?php
          if($row['approval_status']==0)
          {
          ?>        
         <a class="btn btn-primary" href="updatecust_status.php?id=<?php echo $row['Customer_id'];?>">approve</a>
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
    </table></center>
  </div>
  </section>
