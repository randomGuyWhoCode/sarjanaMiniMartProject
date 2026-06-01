<?php
include_once("dbconn.php");
include_once("card.php");

// 1. Strict whitelisting security check from our last conversation!
$allowed_types = ['product', 'customer', 'staff', 'sale'];
$type = isset($_GET['type']) ? $_GET['type'] : 'product';

if (!in_array($type, $allowed_types)) {
    echo "<p>Invalid type selected.</p>";
    exit;
}

// 2. Determine the SQL query based on selection
// Note: Adjust table columns ($id, $name, $price) to match your real database schema
switch ($type) {
    case 'staff':
        $sql = "SELECT * FROM employee";
        break;
    case 'customer':
        $sql = "SELECT * FROM dbstudentsphg.students";
        break;
    case 'sale':
        // $sql = "SELECT sale_id AS id, invoice_no AS name, total_amount AS detail FROM sale";
        break;
    case 'product':
    default:
        $sql = "SELECT * FROM product ORDER BY RAND()";
        break;
}

$query = mysqli_query($dbconn, $sql);

// 3. Generate and return the updated card HTML
if (mysqli_num_rows($query) > 0) {
    while($row_rs = mysqli_fetch_assoc($query)) {
        if($type === 'product') {
            createProductSlip($row_rs["product_id"], $row_rs["product_name"], $row_rs["selling_price"]);
        }else if($type === 'customer') {
            createCustomerSlip($row_rs["studentno"], $row_rs["studentname"], $row_rs["studentemailuitm"]);
        }else if($type === 'staff') {
            createStaffSlip($row_rs["employee_id"], $row_rs["name"], $row_rs["phone_number"], $row_rs["email"]);
        }else if($type === 'sale') {

        }
    }
} else {
    echo '<p>No records found for ' . htmlspecialchars($type) . '.</p>';
}
?>