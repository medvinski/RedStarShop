<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">       
    <link rel="stylesheet" href="stylesheets/disclaimer.css">
    
                            
    <title>Document</title>
</head>


<body>
<h1>This website is  an educational resource about North Korea using e-commerce project template.</h1>
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
include "footer.html";
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
