<?php
session_start();
include "dbconn.php";
include "pdoconn.php";

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['product_id'], $_POST['quantity'], $_SESSION['id'])) {
    
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];
    $student_id = (int)$_SESSION['id'];

    if ($quantity > 0) {
        $db = new Database();

        //Check cart if already exist
        if(!isset($_SESSION["cart_id"])) {
            $sql = "INSERT INTO shopping_cart (date_created, studentno, active) VALUES (NOW(), ?, true)";
            $db->query($sql,[$student_id]);
            $_SESSION["cart_id"] = $db->lastInsertId();
        }


        //old
        // $sql = "SELECT cart_id FROM shopping_cart WHERE studentno = $student_id AND active = true LIMIT 1";
        // $query = mysqli_query($dbconn, $sql);

        // if ($query && mysqli_num_rows($query) > 0) {
        //     // user have past cart
        //     $cart = mysqli_fetch_assoc($query);
        //     $cartID = $cart['cart_id'];
        // } else {
        //     // new cart
        //     $sql = "INSERT INTO shopping_cart (date_created, studentno, active) VALUES (NOW(), $student_id, true)";
        //     if (mysqli_query($dbconn, $sql)) {
        //         $cartID = mysqli_insert_id($dbconn);
        //     } else {
        //         echo json_encode(['success' => false, 'message' => 'Database error: Could not create shopping cart.']);
        //         exit();
        //     }
        // }

        // check product in cart if already exist in database
        $sql = "SELECT quantity FROM cart_item WHERE cart_id = ? AND product_id = ? LIMIT 1";
        $item = $db->query($sql, [$_SESSION["cart_id"], $product_id])->fetch();
        if($item) {
            $new_quantity = $item['quantity'] + $quantity;
            $sql = "UPDATE cart_item SET quantity = ? WHERE cart_id = ? AND product_id = ?";
            if($db->query($sql, [$new_quantity, $_SESSION["cart_id"], $product_id] )) {
                echo json_encode(['success' => true, 'message' => 'Product quantity has been updated in cart!']);
                exit();
            }else {
                echo json_encode(['success' => false, 'message' => 'Failed to update item quantity in cart.']);
                exit();
            }
        }else {
            $sql = "INSERT INTO cart_item (cart_id, product_id, quantity) VALUES (?, ?, ?)";
            if($db->query($sql, [$_SESSION["cart_id"], $product_id, $quantity])) {
                echo json_encode(['success' => true, 'message' => 'Product added to cart successfully!']);
                exit();
            }else {
                echo json_encode(['success' => false, 'message' => 'Failed to add product to cart.']);
                exit();
            }
        }


        // $sql = "SELECT quantity FROM cart_item WHERE cart_id = {$_SESSION["cart-id"]} AND product_id = $product_id LIMIT 1";
        // $item_query = mysqli_query($dbconn, $sql);

        // if ($item_query && mysqli_num_rows($item_query) > 0) {
        //     $item = mysqli_fetch_assoc($item_query);
        //     $new_quantity = $item['quantity'] + $quantity;

        //     $sql = "UPDATE cart_item SET quantity = $new_quantity WHERE cart_id = {$_SESSION["cart-id"]} AND product_id = $product_id";
        //     if (mysqli_query($dbconn, $sql)) {
        //         $_SESSION['cart'][$product_id] = $new_quantity;
        //         echo json_encode(['success' => true, 'message' => 'Product quantity updated in cart!']);
        //         exit();
        //     } else {
        //         echo json_encode(['success' => false, 'message' => 'Failed to update item quantity.']);
        //         exit();
        //     }

        // } else {
        //     $sql = "INSERT INTO cart_item (cart_id, product_id, quantity) VALUES ({$_SESSION["cart-id"]}, $product_id, $quantity)";
        //     if (mysqli_query($dbconn, $sql)) {
        //         $_SESSION['cart'][$product_id] = $quantity;
        //         echo json_encode(['success' => true, 'message' => 'Product added to cart successfully!']);
        //         exit();
        //     } else {
        //         echo json_encode(['success' => false, 'message' => 'Failed to add product to cart.']);
        //         exit();
        //     }
        // }


    }    

    echo json_encode(['success' => false, 'message' => 'Quantity must be greater than 0.']);
    exit();
}

echo json_encode(['success' => false, 'message' => 'Invalid request data or unauthorized session.']);
exit();