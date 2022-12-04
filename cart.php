<?php

include("config.php");
include("header.html");

if(isset($_POST['update_update_btn'])){
   $update_value = $_POST['update_quantity'];
   $update_id = $_POST['update_quantity_id'];
   $update_quantity_query = mysqli_query($conn, "UPDATE cart SET quantity = '$update_value' WHERE id = '$update_id'");
   if($update_quantity_query){
      header('location:cart.php');
   };
};

if(isset($_GET['remove'])){
   $remove_id = $_GET['remove'];
   mysqli_query($conn, "DELETE FROM cart WHERE id = '$remove_id'");
   header('location:cart.php');
};

if(isset($_GET['delete_all'])){
   mysqli_query($conn, "DELETE FROM cart");
   header('location:cart.php');
}

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
         <!-- <th>Quantity</th>
         <th>Total price</th> -->
         <!-- <th>Action</th> -->
      </thead>

      <tbody>

         <?php 
         
         $select_cart = mysqli_query($conn, "SELECT * FROM cart");
         $grand_total = 0;
         if(mysqli_num_rows($select_cart) > 0){
            while($fetch_cart = mysqli_fetch_assoc($select_cart)){
         ?>

         <tr>
            <td><?php echo $fetch_cart['name']; ?></td>
            <td><?php echo number_format($fetch_cart['price']); ?>₩</td>
            <td>
               <form action="" method="post">
                  <input type="hidden" name="update_quantity_id"  value="<?php echo $fetch_cart['id']; ?>" >
                  
               </form>   
            </td>
            
            
         </tr>
         <?php
             
            };
         };
         ?>
         

      </tbody>

   </table>

   <div class="confirm-order-btn">
      <a href="confirm-order.php" class="btn" >Confirm purchase</a>
   </div>

</section>

</div>
   
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>