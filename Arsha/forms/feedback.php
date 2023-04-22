<?php
include 'connection.php';


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FEEDBACK</title>
</head>
<body>
    
<form action="submit_feedback.php" method="post">
    <label for="Customer_id">customer_id:</label>
    <input type="text" id="name" name="name"><br>

    <label for="date"> Date</label>
    <input type="email" id="email" name="email"><br>

    <label for="feedback">Feedback:</label>
    <textarea id="feedback" name="feedback"></textarea><br>


    <input type="submit" value="Submit">
</form>

</body>
</html>