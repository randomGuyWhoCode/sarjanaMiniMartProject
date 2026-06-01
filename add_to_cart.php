<?php
session_start();
include "dbconn.php";


// check if cart is initialize
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'], $_SESSION['name'], $_SESSION['id'])) {
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    $customer_id = (int)$_SESSION['id'];

    if ($quantity > 0) {
        // true if product is already in cart, else new product added into database
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id] += $quantity;

            $sql = "SELECT * FROM shopping_cart WHERE studentno = $customer_id AND active = true";
            $query = mysqli_query($dbconn, $sql);
            $cartID = mysqli_fetch_assoc($query)["cart_id"];

            $sql = "UPDATE cart_item SET quantity = $quantity;";
            if (mysqli_query($dbconn, $sql)) {
                echo "<script>alert('Product added successfully!');</script>";
            } else {
                echo json_encode(['success' => false, 'message' => 'Database error: Could not create shopping cart.']);
                exit();
            }

        } else {
            $_SESSION['cart'][$product_id] = $quantity;

            //add the new created cart to database
            $sql = "INSERT INTO  shopping_cart (date_created, studentno, active) VALUES (NOW(), {$_SESSION['id']}, true)";
            if (mysqli_query($dbconn, $sql)) {
                echo "<script>alert('Shopping cart created successfully!');</script>";
            } else {
                echo "<script>alert('Something went wrong');</script>";
            }

            $sql = "SELECT * FROM shopping_cart WHERE studentno = {$_SESSION['id']} AND active = true";
            $query = mysqli_query($dbconn, $sql);
            $cartID = mysqli_fetch_assoc($query)["cart_id"];
            
            $sql = "INSERT INTO cart_item (cart_id, product_id, quantity) VALUES ($cartID, $quantity, {$_SESSION['id']})";
            if (mysqli_query($dbconn, $sql)) {
                echo "<script>alert('Product added successfully!');</script>";
            } else {
                echo "<script>alert('Something went wrong');</script>";
            }
            
        }
    }    

    // Respond back to JavaScript
        echo json_encode(['success' => true]);
        exit();
    
}

// Return failure if something went wrong
echo json_encode(['success' => false]);
exit();