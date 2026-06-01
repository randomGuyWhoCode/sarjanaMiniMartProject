<?php
include_once("dbconn.php");
include_once("card.php");

$sql = "SELECT * FROM category WHERE category_id = {$_GET['category']}";

$query = mysqli_query($dbconn, $sql);

// 3. Generate and return the updated card HTML
if (mysqli_num_rows($query) == 1) {
    $sql = "SELECT * FROM product WHERE category_id = {$_GET['category']}";
    $query = $query = mysqli_query($dbconn, $sql);
    if(mysqli_num_rows($query) <= 0) {
        echo "No records found";
    }
    while($row_rs = mysqli_fetch_assoc($query)) {
        createCard($row_rs["product_id"], $row_rs["product_name"], $row_rs["selling_price"], $row_rs["product_dir"]);
    }
} else {
    echo '<p>No records found for ' . htmlspecialchars($_GET['category']) . '.</p>';
}
?>