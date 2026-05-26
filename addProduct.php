<?php
session_start();
include "dbconn.php"; 

if (isset($_POST['submit_product'])) {
    
    // Change data type
    $product_name  = mysqli_real_escape_string($dbconn, trim($_POST['product_name']));
    $quantity      = intval($_POST['product_quantity']);
    $price_cost    = floatval($_POST['price_cost']);
    $price_sale    = floatval($_POST['price_sale']);
    
    $category_input = $_POST['category'];
    if ($category_input === 'none' || empty($category_input)) {
        $category = "NULL"; // Sends null to database
    } else {
        $category = intval($category_input);
    }
    
    // Default image 
    $target_file = "product-img/default-image.png"; 

    // Check if image is uploaded
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $target_dir  = "product_img/"; 
        $file_name   = time() . "_" . basename($_FILES["product_image"]["name"]); 
        $target_file = $target_dir . $file_name;
        
        if (!move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            echo "<script>alert('Failed to upload image. Using default image.');</script>";
            $target_file = "product_img/default-image.png"; 
        }
    }

    // insert data into database
    $sql = "INSERT INTO product (product_name, cost_price, selling_price, category_id, stock_quantity, product_dir) 
            VALUES ('$product_name', $price_cost, $price_sale, $category, $quantity, '$target_file')";
            
    if (mysqli_query($dbconn, $sql)) {
        echo "<script>alert('Product added successfully!'); window.location='addProduct.php';</script>";
        exit();
    } else {
        die("Database Error: " . mysqli_error($dbconn) . "<br>Executed Query: " . $sql);
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://googleapis.com" />
    <link rel="stylesheet" href="styles.css">
    <title>Sarjana Minimart</title>
</head>
<body>
    <?php include("sidebar.php"); staffNav();?>
    <div class="side-margin">
        <form action="addProduct.php" method="POST" enctype="multipart/form-data">
            <div class="header">
                <h1 >Add New Product</h1>
                <i class="fa-solid fa-floppy-disk fa-2x"></i>
            </div>

            <div class="add-product container">
                <div class="image-input">
                    <img src="./img/default-image.png" alt="product image" id="preview">
                    <input type="file" name="product_image" id="imageFile" accept="image/*" onchange="previewImage(event)">
                </div>
                <div class="product-detail">
                    <h1>Product Information</h1>
                    <input type="text" name="product_name" placeholder="Name" required>
                    <input type="number" name="product_quantity" placeholder="Quantity" min="0" required>
                    <input type="number" name="price_cost" placeholder="Price Cost" min="0" step="0.01" required>              
                    <input type="number" name="price_sale" placeholder="Price Sell" min="0" step="0.01" required>
                    <label>Category: 
                        <select name="category" id="category" required>
                            <option value="">None</option>
                            <option value="1">Dairy</option>
                            <option value="2">Snack</option>
                            <option value="3">Drink</option>
                            <option value="4">Hygiene</option>
                            <option value="5">Medicine</option>
                            <option value="6">Misc</option>
                        </select>
                    </label>
                    <button type="submit" name="submit_product">Submit</button>
                </div>   
            </div>
        </form>
    </div>

    <script>
        document.getElementById('imageFile').onchange = event => {
            const [file] = document.getElementById('imageFile').files;
            if (file) {
                document.getElementById('preview').src = URL.createObjectURL(file);
            }
        }

        function previewImage(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview');
            output.src = reader.result;
        }
        reader.readAsDataURL(event.target.files);
    }
    </script>

</body>
</html>