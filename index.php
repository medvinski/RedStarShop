



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">       
    <link rel="stylesheet" href="stylesheets/disclaimer.css">
    
                            
    <title>Disclaimer</title>
</head>


<body>
<h1>This website is an educational resource about North Korea using e-commerce project template.</h1>
<h1>"Democratic People's Republic of Korea's" - "DPRK" (which isn't a democratic state but a dictatorship) reality is explored via various features of this online shop</h1>
<div class="popup" onclick="myFunction()"><i class="bi bi-exclamation-square" style="font-size: 5em;"></i> 
  <span class="popuptext" id="myPopup">Clicking on this icon will show additional socio-economic context on the website</span>
</div>
<br><br><br><br>
<div class="container">
  <div class="center">
  <a class="rainbow rainbow-2" href="shop.php">GO TO SHOP</a>
</a>
  </div>
</div>
<?php


function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
  
  
// Function call
function_alert("Multiple alert messages are intentional. These are meant to mimic constant propaganda in North Korea.");



        
?> 

<script>
// When the user clicks on div, open the popup
function myFunction() {
  var popup = document.getElementById("myPopup");
  popup.classList.toggle("show");
}
</script>
</body>

</html>
