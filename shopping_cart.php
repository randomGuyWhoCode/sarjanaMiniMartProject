<?php include "header.php";?>
<div class="side-margin">
<div class="header">
    <h2 >Shopping Cart</h2>
    <i class="fa-solid fa-cart-shopping fa-2x"></i>
</div>
<div class="shopping-cart container">
    
    <?php 
    if(isset($_SESSION['cart_id'])) {
        include_once "pdoconn.php";
        include_once "dbconn.php";
        include_once "card.php";
        
        $totalCheckout = 0;
        $db = new Database();
        $sql = "SELECT * FROM cart_item WHERE cart_id= ?";
        $items = $db->query($sql, [$_SESSION['cart_id']])->fetchAll();
        foreach($items as $item) {
            $product = $db->query("SELECT * FROM product WHERE product_id = ?", [$item["product_id"]])->fetch();
            createShoppingCard($product["product_name"], $product["selling_price"], $item["quantity"], $product["product_dir"]);
            $totalCheckout += (float)$product["selling_price"] * (int)$item["quantity"];
        }


        // while($row_rs = mysqli_fetch_assoc($query)) {
        //     $product =  mysqli_fetch_assoc(mysqli_query($dbconn, "SELECT * FROM product WHERE product_id = {$row_rs['product_id']}"));
        //     createShoppingCard($product["product_name"], $product["selling_price"], $row_rs["quantity"], $product["product_dir"]);
        //     $totalCheckout += (float)$product["selling_price"] * (int)$row_rs["quantity"];
        // }
        
        // foreach($_SESSION["cart"] as $key=>$element) {
        //     echo $element;
        // }
        ?>
        <div class="checkout-bar">
            <button class="checkout-btn" id="checkout-btn">Checkout</button>
            <h2>Total Price: RM<?php echo $totalCheckout; ?></h2>
        </div>

        <div id="cartModal" class="modal" >
            <div class="modal-content-checkout">
                <span class="close-btn">&times;</span>
                
                <h3 id="modal-product-name">Confirm Checkout?</h3>
                <div class="modal-list">
                    
                    <?php 
                    if(isset($_SESSION["cart_id"])) {
                        $sql = "SELECT * FROM cart_item WHERE cart_id= ?";
                        $items = $db->query($sql, [$_SESSION['cart_id']])->fetchAll();
                        $count=1;
                        $totalCheckout = 0;
                        foreach($items as $item) {
                            $product = $db->query("SELECT * FROM product WHERE product_id = ?", [$item["product_id"]])->fetch();
                            echo "<div class='checkout-slip'>
                                    <div>
                                        <p>$count. {$product["product_name"]}</p>
                                        <p>&ensp;&ensp;&ensp;RM {$product["selling_price"]}</p>
                                    </div>
                                    <p>x{$item["quantity"]}</p>
                                  </div>";
                                  $count++;
                            $totalCheckout += (float)$product["selling_price"] * (int)$item["quantity"];
                        }
                    }else {
                        echo "<p>There's no product to checkout!</p>";
                    }
                    ?>
                </div>
                
                
                <div id="modal-cart-form" >
                    <p>Total Price: RM <?php echo $totalCheckout ?></p>
                    <br>
                    <a href="paymentPage.php">
                    <button class="modal-btn">
                        Make Payment
                    </button>
                    </a>
                </div>
            </div>
        </div>
    
    </div>
</div>
    <script>
        const checkoutBtn = document.getElementById("checkout-btn");
        const modal = document.getElementById("cartModal");
        checkoutBtn.addEventListener("click", () =>{
            modal.style.display = "block";
        })
    </script>
    <?php
    }else {
        echo "<p>Sign in to save product to cart...</p>";
        echo "</div>";
    }
?>
<?php include "footer.php"?>