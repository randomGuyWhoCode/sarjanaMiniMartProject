<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://googleapis.com" />
    <link rel="stylesheet" href="styles.css">
    <script src="https://cdn.jsdelivr.net/npm/echarts@6.0.0/dist/echarts.min.js"></script>
    <title>Sarjana Minimart</title>
</head>
<body>
    
    <?php 
    include("sidebar.php"); 
    include("dbconn.php");

    staffNav();
    echo '<div class="side-margin">
          <a onclick="history.back()" class="back-arrow">&#129144; Back</a>';
    $type = array("product", "staff", "customer", "sale");
    if (isset($_GET["type"]) && in_array($_GET["type"], $type)) {
        
        if($_GET["type"] === "product") {
            $sql = "SELECT * FROM product WHERE product_id = $_GET[id]";
            $query = mysqli_query($dbconn, $sql)  or die ("Error: " . mysqli_error($dbconn));
            $row = mysqli_num_rows($query);

            if($row == 0) {
                
                    echo '<h1>Invalid ID</h1>
                    <a href="manageData.php">Back</a>';
            } else {
                $r = mysqli_fetch_assoc($query);
                $id = $r['product_id'];
                $name = $r['product_name'];
                $costP = $r['cost_price'];
                $sellP = $r['selling_price'];
                $quantity = $r['stock_quantity'];
                $img = $r['product_dir'];
                $category = $r['category_id'];

            
                    
                        echo '
                        <div class="updateProduct">
                            <div>
                                <img src="'.$img.'" alt="Product image" id="preview">
                                <input type="file" name="product_image" id="imageFile" accept="image/*" onchange="previewImage(event)">
                            </div>
                            <div class="updateInfo">
                                
                                <label><span>Product ID: </span><input type="text" placeholder="Product ID" value="'.$id.'" readonly></label>
                                <label><span>Name: </span><input type="text" placeholder="Product Name" value="'.$name.'" required></label>
                                <label><span>Cost Price: </span><input type="number" placeholder="Cost Price" value="'.$costP.'" readonly required></label>
                                <label><span>Selling Price: </span><input type="number" placeholder="Selling Price" value="'.$sellP.'" required></label>
                                <label><span>Quantity: </span><input type="text" placeholder="Product Quantity" value="'.$quantity.'" required></label>
                                <label>Category: <select name="category" id="category" value="2" required>
                                                    <option value="1" '. ($category==="1"?  "selected":"") .' >Dairy</option>
                                                    <option value="2" '.($category==="2"?  "selected":"") .' >Snack</option>
                                                    <option value="3" '.($category==="3"?  "selected":"") .' >Drink</option>
                                                    <option value="4" '.($category==="4"?  "selected":"") .' >Hygiene</option>
                                                    <option value="5" '.($category==="5"?  "selected":"") .' >Medicine</option>
                                                    <option value="6" '.($category==="6"?  "selected":"") .' >Misc</option>
                                                </select>
                                </label>
                            </div>
                        </div>';
                } 

        }else if($_GET["type"] === "customer") {
            $sql = "SELECT * FROM dbstudentsphg.students WHERE studentno = $_GET[id]";


        }else if($_GET["type"] === "staff") {
            $sql = "SELECT * FROM product WHERE product_id = $_GET[id]";


        }else if($_GET["type"] === "sale") {
            $sql = "SELECT * FROM product WHERE product_id = $_GET[id]";
        }

    }else {
        echo "<h1>Error Occured</h1>
        <a href='manageData.php'>Go Back</a>";
    }
    ?>
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
    