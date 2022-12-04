<?php

function function_alert($message) {
       
 echo "<script>alert('$message');</script>";
}
function_alert("Kim Jong Un asks people to eat less till 2025 - Please limit your rice and corn purchases!");
include ("config.php");
include("header.html");
session_start();
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.php');
};

if(isset($_POST['add_to_cart']))

{
    $p_name=mysqli_real_escape_string($conn,$_POST["p_name"]);
    $p_price=$_POST['p_price'];
    $p_quantity =1;
    //SQL query with variable - prepare statement must be used
    $sql ="SELECT * FROM cart WHERE name = ? && user_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $p_name, $user_id);
    $stmt->execute();
    $select_cart = $stmt->get_result();

    if(mysqli_num_rows($select_cart)>0){
    $message = "Only one product type per order";
    echo "<h3>", $message , "</h3>";
    }
    else{
    //SQL query with variable - prepare statement must be used
    $sql1="INSERT INTO cart(user_id, name, price, quantity) VALUES(?,?,?,?)";
    $stmt = $conn->prepare($sql1);
    $stmt->bind_param("isii", $user_id, $p_name,$p_price,$p_quantity);
    $stmt->execute();
    $message= "Product added to cart";
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
    <link rel="stylesheet" href="stylesheets/shop.css">
    <title>Homepage</title>
</head>
<body>
    <section class ="products">
    <h1>Welcome to First North Korean Online Shop!</h1>
    <div class="popup" onclick="myFunction1()"><i class="bi bi-exclamation-square" style="font-size: 5em;"></i> 
  <span class="popuptext" id="myPopup1">Information on the products available: <br><br> 1. Rice ration - staple food in North Korea, but due to shortages and corruption <br> public distribution
system is not providing enough food to the citizens.<br><br>2. Pin with faces of previous dictators is mandatory to wear by DPRK people.<br><br>3. South Korean Movies are strictly forbidden
punishment can involve prison camp sentence. <br><br> 4. Recently it was reported that rice became a luxury reserved for elites, while ordinary workers get corn. <br><br>5. Learning English
from textbooks like this is reserved for elites. <br><br> 6. There is no free movement in North Korea - even within the country itself -<br> people need special permission to travel
to the capital (Pyongang).
</span>
</div>
<div class ="box-container">
<?php
//SQL query without variables - conventional query() method can be used
$select_products = $conn->query("SELECT * FROM products");
    if(mysqli_num_rows($select_products)>0){
        while($row = $select_products->fetch_assoc()){
    ?>
<form action = "" method="post">
<div class ="box">
    <img src="product_images/<?php echo $row['image'];?>" height="400" width="450">
    <h2><?php echo $row['name']; ?></h2>
    <h2><?php echo 'Price:  ' , $row['price'] , '₩'; ?></h2>
    <input type="hidden"  name="p_name" value="<?php echo $row['name']?>">
    <input type="hidden"  name="p_price" value="<?php echo $row['price']?>">
    <input type="hidden"  name="p_image" value="<?php echo $row['image']?>">
    <input type="submit" class="btn" value="Add to cart"  name="add_to_cart">    
</div>
</form>
<?php
 
    };

};
   
?>
</section>

<script>
function myFunction1() {
  var popup1 = document.getElementById("myPopup1");
  popup1.classList.toggle("show");
}
</script>

</body>
</html>