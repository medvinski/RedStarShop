<?php

function function_alert($message) {
      
    // Display the alert box 
    echo "<script>alert('$message');</script>";
}
  
  
// Function call
function_alert("Welcome to Geeks for Geeks");

@include "config.php";

if(isset($_POST["add_product"]))

{

    $p_name = $_POST["p_name"];
    $p_price = $_POST["p_price"];
    $p_image = $_FILES["p_image"]["name"];
    $p_image_tmp_name = $_FILES["p_image"]["tmp_name"];
    $p_image_folder = "images/".$p_image;

    if(empty($p_name) || empty($p_price) || empty($p_image)){
        $message[] = "Please add all information to add a product";
    }
    else{
        $insert ="INSERT INTO products(name, price, image) VALUES('$p_name','$p_price','$p_image')";
        $upload = mysqli_query($conn, $insert );
        if($upload){
            move_uploaded_file($p_image_tmp_name,$p_image_folder);
            $message[] = "Product added successfully";

        }else{
            $message[] ="Product addition failure";
        }
    }
    
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/admin.css">
    <title>Admin Panel</title>
</head>
<body>
<?php

if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }

}

include("header.html");
include("footer.html");

alert("Kim Jong Un asks North Koreans to eat less until 2025 when it reopens its border with China - Please limit your rice purchases (Kim Jong Un's Speech, 2021)");
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>
<div class="container">
<div class="admin-product-form-container">
<form action="<?php $_SERVER["PHP_SELF"]?> "method="post"
enctype="multipart/form-data">
<h2>Add new product</h2>
    <input type="text" name="p_name" placeholder="Product name" class="box" required>
    <input type="number" name="p_price" min="0" placeholder="Price in KPW" class="box" required>
    <input type="file" name="p_image" accept="image/png, image/jpg, image/jped" class="box" required>
    <input type="submit" value="Add product" name="add_product" class="btn">
</form>
</div>
</div>
 

<script src="js/script.js"></script>
<script>
    // When the user clicks on div, open the popup
    function myFunction() {
      var popup = document.getElementById("myPopup");
      popup.classList.toggle("show");
    }
    </script>
</body>
</html>