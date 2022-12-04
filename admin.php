<?php
include("config.php");
include("header-admin.html");
session_start();
$admin_id = $_SESSION['admin_id'];
if($admin_id!=6){
   header('location:login.php');
};
if(isset($_POST["add_product"]))
{

$p_name = htmlspecialchars(($_POST["p_name"]));
$p_price = ($_POST["p_price"]);
$p_image = ($_FILES["p_image"]["name"]);
$p_image_tmp_name = $_FILES["p_image"]["tmp_name"];
$p_image_folder = "product_images/".$p_image;

//SQL query with variable - prepare statement must be used 
$sql="INSERT INTO products( name, price, image) VALUES(?,?,?)"; 
$stmt = $conn->prepare($sql);
$stmt->bind_param("sis", $p_name, $p_price,$p_image);        
if($stmt->execute()){
move_uploaded_file($p_image_tmp_name,$p_image_folder);
$message[] = "Product added successfully";
}else{
$message[] ="Product addition failure";
}
}
if(isset($_GET['delete'])){
       $id = $_GET['delete'];
       mysqli_query($conn, "DELETE FROM products WHERE id=$id");
       header('location:admin.php');
    
};
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
alert("Kim Jong Un asks North Koreans to eat less until 2025 when it reopens its border with China - Please limit your rice purchases (Kim Jong Un's Speech, 2021)");
function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

?>
<div class="container">
<div class="admin-product-form-container">
<form action="<?php echo $_SERVER["PHP_SELF"]?> "method="post"
enctype="multipart/form-data">
<h2>Add new product</h2>
    <input type="text" name="p_name" placeholder="Product name" class="box" required>
    <input type="number" name="p_price" min="0" placeholder="Price in KPW" class="box" required>
    <input type="file" name="p_image" accept="image/png, image/jpg, image/jped" class="box" required>
    <input type="submit" value="Add product" name="add_product"  class="btn">
</form>
</div>

<?php
//SQL query without variables - conventional query() method can be used
$select = $conn->query("SELECT * FROM products");
?>
<div class="product-display">
    <table class ="product-display-table">
     <thead>
        <tr>
            <td>Image</td>
            <td>Name</td>
            <td>Price</td>
            <td>Action</td>
        </tr>
      </thead>
      <?php
      while($row =mysqli_fetch_assoc($select)){
      ?>
    <tr>
       <td><img src="product_images/<?php echo $row['image']; ?>" height="100" alt=""></td>
       <td><?php echo $row['name'];?></td>
       <td><?php echo $row['price'];?></td>
       <td>
        <a href="admin_edit.php?edit=<?php echo $row['id'];?>" class="btn">Edit</a>
        <a href="admin.php?delete=<?php echo $row['id'];?>" class="btn">Delete</a>
       </td>
    </tr>
    <?php };
    ?>

</body>
</html>