<?php 
include_once("pdoconn.php");
include_once("card.php");
if(isset($_GET["search"], $_GET["type"])) {
    $type = $_GET["type"];
    $db = new Database();
    switch ($type) {
        case 'employee':
            $sql = "SELECT * FROM employee WHERE name LIKE ? OR email LIKE ?";
            break;
        case 'customer':
            $sql = "SELECT * FROM dbstudentsphg.students WHERE studentname LIKE ? OR studentno LIKE ?";
            break;
        case 'sales':
            $sql = "SELECT * FROM sales WHERE sales_id LIKE ? OR total_amount LIKE ?";
            break;
        case 'product':
        default:
            $sql = "SELECT * FROM product WHERE product_name LIKE ? OR selling_price LIKE ?";
            break;
    }
    $data = $db->query($sql, [("%".$_GET["search"]."%"), ("%".$_GET["search"]."%")])->fetchAll();

    if (count($data) != 0) {
        foreach($data as $d) {
            if($type === 'product') {
                createProductSlip($d["product_id"], $d["product_name"], $d["selling_price"]);
            }else if($type === 'customer') {
                createCustomerSlip($d["studentno"], $d["studentname"], $d["studentemailuitm"]);
            }else if($type === 'employee') {
                createStaffSlip($d["employee_id"], $d["name"], $d["phone_number"], $d["email"]);
            }else if($type === 'sales') {

            }
        }
    }else {
        echo "There are no record found...";
    }
}else if(isset($_GET["search"])) {
    $db = new Database();
    $sql = "SELECT * FROM product WHERE product_name LIKE ? OR selling_price LIKE ?";
    $data = $db->query($sql, [("%".$_GET["search"]."%"), ("%".$_GET["search"]."%")])->fetchAll();
    if (count($data) != 0) {
        foreach($data as $product) {
            createCard($product["product_id"], $product["product_name"], $product["selling_price"], $product["product_dir"]);
        }
    }else {
        echo "There are no record found...";
    }
}
?>