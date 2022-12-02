<?php


function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
  
  
// Function call
function_alert("Kim Jong Un asks people to eat less till 2025 - Please limit your food purchases!");

include("header.html");
@include "config.php";

        
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/shop.css">
    <link rel="stylesheet" href="stylesheets/admin.css">
    
    
    <title>Homepage</title>
</head>
<body>
<?php
$select = mysqli_query($conn, "SELECT * FROM products");
?>
<div class="product-display">
    <table class ="product-display-table">
     <thead>
        
        <tr>
            <td>Image</td>
            <td>Name</td>
            <td>Price</td>
            <td>Action</td>


        </tr>
      </thead>
      <?php

      while($row =mysqli_fetch_assoc($select)){

      ?>
    <tr>
       <td><img src="product_images/<?php echo $row['image']; ?>" height="100" alt=""></td>
       <td><?php echo $row['name'];?></td>
       <td><?php echo $row['price'];?></td>
       <td>
        <a href="admin_edit.php?edit=<?php echo $row['id'];?>" class="btn">Edit</a>
        <a href="admin.php?delete=<?php echo $row['id'];?>" class="btn">Delete</a>
        
        
       </td>


    </tr>

    <?php };?>



</body>
</html>