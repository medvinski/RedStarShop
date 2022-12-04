<?php


function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
    
// Function call
function_alert("State your songbun! Choose 1 for loyal, 2 for wavering and 3 for hostile class.");
       
?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/user_forms.css">
    <title>Register</title>
</head>
<body>
<div class="form-container">
<form action="" method="post">
      <h2>Register new account</h2>
      <input type="text" name="f_name" required placeholder="Enter firstname" class="box" required>
      <input type="text" name="s_name" required placeholder="Enter surname" class="box" required>
      <input type="number" name="songbun" min="1" max="3"  placeholder="Songbun" class="box" required>
      <input type="text" name="u_name" required placeholder="Enter username" class="box" required>
      <input type="email" name="email" required placeholder="Enter email" class="box">
      <input type="password" name="password" required placeholder="Enter password" class="box" required>
      <input type="password" name="cpassword" required placeholder="Confirm password" class="box" required>
      <input type="submit" name="submit" class="btn" value="Register"><br><br><br>
      
      <p>Already registered? <a href="login.php">Login now</a></p>
      <p> <a href="index.php">Go back to disclaimer</a></p>
   </form><br> <br> <br> 
  <div class="popup" onclick="myFunction()"><i class="bi bi-exclamation-square" style="font-size: 3em;"></i> 
  <span class="popuptext" id="myPopup">Songbun is the system of ascribed status used in North Korea, and is used 
    to justify politically determined discrimination in employment, residence, and schooling  </span>
</div>
</div>


</body>

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
</html>