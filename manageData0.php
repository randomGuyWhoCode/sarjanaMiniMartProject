<?php
include_once("card.php");
include_once("pdoconn.php");

$allowed_types = ['product', 'customer', 'employee', 'sales'];
$type = isset($_GET['type']) ? $_GET['type'] : 'product';

if (!in_array($type, $allowed_types)) {
    echo "<p>Invalid type selected.</p>";
    exit;
}

switch ($type) {
    case 'employee':
        $sql = "SELECT * FROM employee";
        break;
    case 'customer':
        $sql = "SELECT * FROM dbstudentsphg.students";
        break;
    case 'sales':
        $sql = "SELECT * FROM sales";
        break;
    case 'product':
    default:
        $sql = "SELECT * FROM product ORDER BY RAND()";
        break;
}


$db = new Database();
$data = $db->query($sql)->fetchAll();
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
} else {
    echo '<p>No records found for ' . htmlspecialchars($type) . '.</p>';
}
// $query = mysqli_query($dbconn, $sql);
// if (mysqli_num_rows($query) > 0) {
//     while($row_rs = mysqli_fetch_assoc($query)) {
//         if($type === 'product') {
//             createProductSlip($row_rs["product_id"], $row_rs["product_name"], $row_rs["selling_price"]);
//         }else if($type === 'customer') {
//             createCustomerSlip($row_rs["studentno"], $row_rs["studentname"], $row_rs["studentemailuitm"]);
//         }else if($type === 'staff') {
//             createStaffSlip($row_rs["employee_id"], $row_rs["name"], $row_rs["phone_number"], $row_rs["email"]);
//         }else if($type === 'sale') {

//         }
//     }
// } else {
//     echo '<p>No records found for ' . htmlspecialchars($type) . '.</p>';
// }
?>