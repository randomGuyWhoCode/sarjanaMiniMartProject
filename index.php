<?php 
include "header.php";
include_once "dbconn.php"; 
if(isset($_SESSION["name"])) {
    $nameArr = explode(" " , $_SESSION['name']);
    if(count($nameArr) <= 0) {
        $staff_name = "Guest";
    }else if(count($nameArr) == 1) {
        $staff_name = $nameArr[0];
    }else {
        $staff_name = $nameArr[0] . " " . $nameArr[1];
    }
}else {
    $staff_name = "Guest";
}
?>

    <div class="main-content side-margin">
        <div class="header container">
            <h2 >Main Menu</h2>
            <p>Welcome <?php echo $staff_name; ?></p>
        </div>
        <div class="top-content">
            <form class="search-bar" method="post" action="searchResultPage.php">
            <input type="text" name="search" id="search-input" class="search-input" placeholder="Search...">
            <button class="search-button">Search</button>
            </form>
        </div>
        
        <!-- <div class="top-content">
            
            <a href="index.php" class="logo"><img src="img/Sarjana-transparent.png" alt="logo"></a>
            

            <form class="search-bar" method="post" action="searchResultPage.php">
                <input type="text" name="search" id="search-input" class="search-input" placeholder="Search...">
                <button class="search-button">Search</button>
            </form>
            <div>
                <p>Welcome <?php 
                            // if(isset($_SESSION['name'])) {
                            //     $nameArr = explode(" " , $_SESSION['name']);
                            //     if(count($nameArr) <= 0) {
                            //         $staff_name = "Guest";
                            //     }else if(count($nameArr) == 1) {
                            //         $staff_name = $nameArr[0];
                            //     }else {
                            //         $staff_name = $nameArr[0] . " " . $nameArr[1];
                            //     }
                            //     echo $staff_name;
                            // }else {
                            //     echo "Guest";
                            // }
                            ?></p>
            </div>
        </div> -->
        <div class="infographic">
            <div class="sales-banner">
                <a href="#top-product"><img src="./img/sales_banner2.png" alt="Sales banner"></a>
            </div>

            <div class="category-section" > 
                <h2>EXPLORE OUR CATEGORIES</h2>
                <div class="category-container">
                    
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

                    <a href="./categoryPage.php?category=4" class="category-item">
                            <div class="category-icon"><i class="fa-solid fa-cheese"></i></div>
                            <span>Dairy</span>
                    </a>

                    <a href="./categoryPage.php?category=5" class="category-item">
                        <div class="category-icon"><i class="fa-solid fa-cogs"></i></div>
                        <span>Misc</span>
                    </a>
                </div>
            </div>
        </div>
        
            <!-- <div class="sales-banner">
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
            </div> -->
        
        
        <div class="items" id="top-product">
            
            <h1>FEATURED PRODUCTS</h1>
            <div class="card-items">
                <?php 
                    include_once("pdoconn.php");
                    include_once("card.php");
                    
                    $db = new Database();
                    $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 18";

                    $products = $db->query($sql)->fetchAll();

                    foreach ($products as $product) {
                        createCard($product["product_id"], $product["product_name"], $product["selling_price"], $product["product_dir"]);
                    }

                    //Version 2
                    // $sql = "SELECT * FROM product ORDER BY RAND() LIMIT 12";
                    // $query = mysqli_query($dbconn, $sql);
                    // while($row_rs = mysqli_fetch_assoc($query)) {
                    //     createCard($row_rs["product_id"], $row_rs["product_name"], $row_rs["selling_price"], $row_rs["product_dir"]);
                    // }
                    
                    //Version 1
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
<script>
    const searchBar = document.getElementById("search-input");
    
    searchBar.addEventListener("keydown", (e)=>{
        if(e.key === "Enter") {
            window.location.href = "searchResultPage.php";
        }
    })
</script>

<?php include "footer.php"; ?>