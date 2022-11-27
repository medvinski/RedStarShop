<?php

$id = $_GET['edit'];
@include "config.php";

if(isset($_POST["edit_product"])){



    $p_name = $_POST["p_name"];
    $p_price = $_POST["p_price"];
    $p_image = $_FILES["p_image"]["name"];
    $p_image_tmp_name = $_FILES["p_image"]["tmp_name"];
    $p_image_folder = "product_images/".$p_image;

    if(empty($p_name) || empty($p_price) || empty($p_image)){
        $message[] = "Please add all information to add a product";
    }else{
        $edit ="UPDATE products SET name='$p_name', price='$p_price', image='$p_image' WHERE id = '$id'";
        $upload = mysqli_query($conn, $edit);
        if($upload){
            move_uploaded_file($p_image_tmp_name,$p_image_folder);
            $message[] = "Product added successfully";

        }else{
            $message[] ="Product addition failure";
        }
    
    }
};

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylesheets/admin.css">
    <title>Admin Edit Panel</title>
</head>
<body>

<?php

if(isset($message)){
    foreach($message as $message){
        echo '<span class="message">'.$message.'</span>';
    }

}
?>
<div class="container">
<div class="admin-product-form-container">

<?php

$select = mysqli_query($conn, "SELECT * FROM products WHERE id = $id");
while($row=mysqli_fetch_assoc($select)){



?>

<form action="<?php $_SERVER["PHP_SELF"]?> "method="post"
enctype="multipart/form-data">
<h2>Edit product</h2>
    <input type="text" name="p_name" placeholder="Product name" value="<?php $row['name'];?>" class="box" required>
    <input type="number" name="p_price" min="0" placeholder="Price in KPW" value="<?php $row['price'];?>"class="box" required>
    <input type="file" name="p_image" accept="image/png, image/jpg, image/jped" value="<?php $row['image'];?>" class="box" required>
    <input type="submit" value="Edit product" name="edit_product" class="btn">
    <a href="admin.php" class="btn">Go back</a>
</form>

<?php };?>
</div>



</div>
    
</body>
</html>