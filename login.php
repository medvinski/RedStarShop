<?php

include ("config.php");
session_start();
if(isset($_POST["submit"])){
$email = mysqli_real_escape_string($conn,$_POST["email"] );
$password = mysqli_real_escape_string($conn, sha1($_POST["password"]));

//SQL query with variable - prepare statement must be used
$sql ="SELECT * FROM users WHERE email = ? && password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email,$password);
$stmt->execute();
$select = $stmt->get_result();
if(mysqli_num_rows($select) > 0){
    $row = $select->fetch_assoc();
     if($row['email']=='admin@gmail.com'){
        $_SESSION['admin_id'] = $row['id'];
        header('location:admin.php');
     }else{
        $_SESSION['user_id'] = $row['id'];
        header('location:shop.php');
     }

    }
   else{
        $message= "Incorrect password or login!";
        echo "<h3>", $message , "</h3>";
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