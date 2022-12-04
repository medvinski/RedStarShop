<?php
include("config.php");
include("header.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Shopping Cart</title>
   <link rel="stylesheet" href="stylesheets/admin.css">
</head>
<body>

<h1 class="heading">Shopping cart</h1>
<div class="product-display">
<table class ="product-display-table">
      <thead>
         <th>Product name</th>
         <th>Product price</th>   
      </thead>
      <tbody>
         <?php 
         session_start();
         $user_id = $_SESSION['user_id'];
         //SQL query with variable - prepare statement must be used
         $sql ="SELECT * FROM cart WHERE user_id = ?";
         $stmt = $conn->prepare($sql);
         $stmt->bind_param("i", $user_id);
         $stmt->execute();
         $select = $stmt->get_result();
         if(mysqli_num_rows($select) > 0){
            while($row = $select->fetch_assoc()){
         ?>
         <tr>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo number_format($row['price']); ?>₩</td> 
         </tr>
         <?php    
         }
      }   
      ?>  
      </tbody>
   </table>
   <div class="confirm-order-btn">
   <a href="confirmation.php" class="btn" >Confirm purchase</a>
   </div>
</section>
</div>
</body>
</html>