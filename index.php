<?php include "header.php";
include_once "dbconn.php"; ?>

<div class="main-content">
    <div class="top-content">
        
        <div class="sales-banner">
        <a href="#top-product"><img src="./img/sales_banner2.png" alt="Sales banner"></a>
        </div>


        <div class="category-section container" > 
            <h1>EXPLORE OUR CATEGORIES</h1>
            <div class="category-flex">
                
                <a href="./categoryPage.php?category=2" class="category-item">
                        <div class="category-icon"><i class="fas fa-cookie"></i></div>
                        <span>Snacks</span>
                </a>

                <a href="./categoryPage.php?category=3" class="category-item">
                        <div class="category-icon"><i class="fa-solid fa-bottle-water"></i></i></div>
                        <span>Drinks</span>
                </a>

                <a href="./categoryPage.php?category=4" class="category-item">
                        <div class="category-icon"><i class="fas fa-pump-soap"></i></div>
                        <span>Hygiene</span>
                </a>

                <a href="./categoryPage.php?category=5" class="category-item">
                    <div class="category-icon"><i class="fa fa-medkit"></i></div>
                    <span>Medicine</span>
                </a>
            </div>
        </div>
    </div>
    
    <div class="items container" id="top-product">
        <h1>TOP PRODUCT</h1>
        <div class="card-items">
            <?php 
                include_once("card.php");
                $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 12";
                $query = mysqli_query($dbconn, $sql);
                while($row_rs = mysqli_fetch_assoc($query)) {
                    createCard($row_rs["product_id"], $row_rs["product_name"], $row_rs["selling_price"], $row_rs["product_dir"]);
                }
                
                // $items = ["Farm fresh original 1l"=>"./img/fresh_milk_1L.png",
                //         "Farm fresh chocolate 1l"=>"./img/chocolate_milk.png",
                //         "Biscuit Tiger"=>"./img/biscuit_tiger.png",
                //         "Vico"=>"./img/Vico.png",
                //         "Colgate Toothbrush"=>"./img/Colgate_toothbrush.png",
                //         "Indomie"=>"./img/indomie-mi.png",
                //         "Biscuit Tiger XL"=>"./img/biscuit_tiger.png", 
                //         "Farm fresh original 250ml"=>"./img/fresh_milk_1L.png"];
                // foreach($items as $key => $value) {
                //     createCard($key, $value);
                // }
            ?>
        </div>
    </div>

    <!-- <hr> -->

    <div class="items container">
        <h1>Browse Other Products</h1>
        <div class="card-items">
        <?php 
            $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 12";
            $query = mysqli_query($dbconn, $sql);
            while($row_rs = mysqli_fetch_assoc($query)) {
                createCard($row_rs["product_id"], $row_rs["product_name"], $row_rs["selling_price"], $row_rs["product_dir"]);
            }

            //     include_once("card.php");
            //     $items = ["Farm fresh original 1l"=>"./img/fresh_milk_1L.png",
            //             "Farm fresh chocolate 1l"=>"./img/chocolate_milk.png",
            //             "Biscuit Tiger"=>"./img/biscuit_tiger.png",
            //             "Vico"=>"./img/Vico.png",
            //             "Colgate Toothbrush"=>"./img/Colgate_toothbrush.png",
            //             "Indomie"=>"./img/indomie-mi.png"];
            //     $items = array_reverse($items);
            //     foreach($items as $key => $value) {
            //         createCard($key, $value);
            //     }
            // ?>
            
        </div>
    </div>
    
</div>


<div id="cartModal" class="modal" >
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        
        <h3 id="modal-product-name">Product Name</h3>
        <img id="modal-product-image" class="modal-product-image" src="img/default-image.png" alt="product image" >
        <p>Price: RM<span id="modal-product-price">0.00</span></p>
        
        <form id="modal-cart-form" >
            <input type="hidden" id="modal-product-id" name="product_id">
            <label for="quantity">Quantity:</label>
            <input type="number" id="modal-quantity" name="quantity" value="1" min="1">
            <br>
            <button class="modal-btn" type="submit">
                Confirm Add to Cart
            </button>
        </form>
    </div>
</div>



<?php include "footer.php" ?>