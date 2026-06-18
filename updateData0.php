<?php 
include "dbconn.php";
include_once "pdoconn.php";

if(isset(/*$_SESSION["is_staff"],*/$_POST["productid"], $_POST["productname"], $_POST["costprice"], $_POST["sellingprice"], $_POST["category"])) {
    $id = (int)$_POST["productid"];
    $name = (String)$_POST["productname"];
    $sellingPrice = (float)$_POST["sellingprice"];
    $quantity = (int)$_POST["quantity"];
    $category = (int)$_POST["category"];

    // Default image 
    $target_file = (String)$_POST["initial_img"]; 

    // Check if image is uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $target_dir  = "product_img/"; 
        $file_name   = time() . "_" . basename($_FILES["image"]["name"]); 
        $target_file = $target_dir . $file_name;
        
        //if failed to move image into folder
        if (!move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            echo "<script>alert('Failed to upload image. Using default image.');</script>";
            $target_file = (String)$_POST["initial_img"]; 
            echo json_encode(['success' => false, 'message' => 'Something goes wrong...']);
            exit();
        }else {
            if (file_exists((String)$_POST["initial_img"])) {
                unlink((String)$_POST["initial_img"]);
            }
                    
        }
    }
    $db = new Database();
    $sql = "UPDATE product SET product_name = ?, selling_price = ?, category_id = ?, stock_quantity = ?, product_dir = ? WHERE product_id = ?";
    $stmt = $db->query($sql, [$name, $sellingPrice, $category, $quantity, $target_file, $id]);



    // echo $stmt->rowCount() . " users were deactivated.";
    echo json_encode(['success' => true, 'message' => 'Success...', "product"=>["name"=>$name, "selling_price"=> $sellingPrice, "quantity"=>$quantity, "product_dir"=>$target_file]]);
}else {
    echo json_encode(['success' => false, 'message' => 'Something goes wrong...']);
}
?>