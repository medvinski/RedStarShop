<?php

include ("config.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">       
    <link rel="stylesheet" href="stylesheets/profile.css">
    
                            
    <title>Profile</title>
</head>


<body>
<div class="container">

<div class="product-display">

   <?php
   session_start();
   $user_id = $_SESSION['user_id'];
      $select_user = mysqli_query($conn, "SELECT * FROM users WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select_user) > 0){
         $fetch_user = mysqli_fetch_assoc($select_user);
      };
   ?>
   <h1>Profile information </h1>
   <h2> Name : <span><?php echo $fetch_user['f_name']; ?></span> </h2>
   <h2> Surname : <span><?php echo $fetch_user['s_name']; ?></span> </h2>
   <h2> Songbun : <span><?php echo $fetch_user['songbun']; ?></span> </h2>
   <h2> Email : <span><?php echo $fetch_user['email']; ?></span> </h2>
   <div class="container">
  <div class="center">
  <a class="rainbow rainbow-2" href="shop.php">Back to Shop</a>
  </div>
   

</div>
</body>
</html>
