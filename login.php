<?php

include ("config.php");
session_start();

if(isset($_POST["submit"])){


  $u_name = mysqli_real_escape_string($conn,$_POST["u_name"] );
  $email = mysqli_real_escape_string($conn,$_POST["email"] );
  $password = sha1($_POST["password"]);
 

  $select = "SELECT * FROM users WHERE email ='$email' && password = '$password'";


  $result =mysqli_query($conn, $select);
  if(mysqli_num_rows($result)>0){
    $row = mysqli_fetch_array($result);
    if($row['email'== 'admin@gmail.com']){
        $_SESSION['admin_name'] = $row['u_name'];
        header('location:admin.php');

    }    
}elseif($row['email'== 'email']){
    $_SESSION['user_name'] = $row['u_name'];
    header('location:shop.php');
}else{
    $message = "Incorrect username or password!";
      echo "<h3>", $message ,"</h3>";
}
}


       
?> 



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/user_forms.css">
    <title>Login</title>
</head>
<body>
<div class="form-container">
<form action="" method="post">
      <h2>Login</h2>
      <input type="text" name="u_name" required placeholder="Enter username" class="box" required>
      <input type="email" name="email" required placeholder="Enter email" class="box">
      <input type="password" name="password" required placeholder="Enter password" class="box" required>
      <input type="submit" name="submit" class="btn" value="Login"><br><br><br>
      <p>Register new account? <a href="register.php">Register here</a></p>
      <p> <a href="index.php">Go back to disclaimer</a></p>
   </form><br> <br> <br> 
  
</div>
</div>
</body>

</script>
</html>