<?php
$id = $_GET['edit'];
include("config.php");
if(isset($_POST["edit_product"])){
    $p_name = $_POST["p_name"];
    $p_price = $_POST["p_price"];
    $p_image = $_FILES["p_image"]["name"];
    $p_image_tmp_name = $_FILES["p_image"]["tmp_name"];
    $p_image_folder = "product_images/".$p_image;
    //SQL query with variable - prepare statement must be used
    $sql = "UPDATE products SET name=?, price=?, image=? WHERE id=?";
    $stmt= $conn->prepare($sql);
    $stmt->bind_param("sisi", $p_name, $p_price, $p_image, $id);
    if($stmt->execute()){
    move_uploaded_file($p_image_tmp_name,$p_image_folder);
    $message[] = "Product edited successfully";
    }else{
    $message[] ="Product edition failure";
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
//SQL query with variable - prepare statement must be used
$sql1 ="SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql1);
$stmt->bind_param("i", $id);
$stmt->execute();
$select = $stmt->get_result();
 while($row = $select->fetch_assoc()){

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