<?php include "header.php" ?>
<div class="main-content">
    <div class="sales-banner">
        <a href="#top-product"><img src="./img/sales_banner2.png" alt="Sales banner"></a>
    </div>
    <hr>
    <div class="category-section container">
        <h1>EXPLORE OUR CATEGORIES</h1>
        <div class="category-flex">
            <div class="category-item">
                    <div class="category-icon"><i class="fas fa-cookie"></i></div>
                    <span>Snacks</span>
            </div>

            <div class="category-item">
                    <div class="category-icon"><i class="fa-solid fa-bottle-water"></i></i></div>
                    <span>Drinks</span>
            </div>

            <div class="category-item">
                    <div class="category-icon"><i class="fas fa-pump-soap"></i></div>
                    <span>Hygiene</span>
            </div>

            <div class="category-item">
                <div class="category-icon"><i class="fa fa-medkit"></i></div>
                <span>Medicine</span>
            </div>
        </div>
    </div>
    <div class="items container" id="top-product">
        <h1>Top Product</h1>
        <div class="card-items">
            <?php 
                include_once("card.php");
                $items = ["Farm fresh original 1l"=>"./img/fresh_milk_1L.png",
                        "Farm fresh chocolate 1l"=>"./img/chocolate_milk.png",
                        "Biscuit Tiger"=>"./img/biscuit_tiger.png",
                        "Vico"=>"./img/Vico.png",
                        "Colgate Toothbrush"=>"./img/Colgate_toothbrush.png",
                        "Indomie"=>"./img/indomie-mi.png",
                        "Biscuit Tiger XL"=>"./img/biscuit_tiger.png", 
                        "Farm fresh original 250ml"=>"./img/fresh_milk_1L.png",];
                foreach($items as $key => $value) {
                    createCard($key, $value);
                }
            ?>
        </div>
    </div>


    <div class="items container">
        <h1>Browse Other Products</h1>
        <div class="card-items">
        <?php 
                include_once("card.php");
                $items = ["Farm fresh original 1l"=>"./img/fresh_milk_1L.png",
                        "Farm fresh chocolate 1l"=>"./img/chocolate_milk.png",
                        "Biscuit Tiger"=>"./img/biscuit_tiger.png",
                        "Vico"=>"./img/Vico.png",
                        "Colgate Toothbrush"=>"./img/Colgate_toothbrush.png",
                        "Indomie"=>"./img/indomie-mi.png"];
                $items = array_reverse($items);
                foreach($items as $key => $value) {
                    createCard($key, $value);
                }
            ?>
            <?php 
                include_once("card.php");
                $items = ["Farm fresh original 1l"=>"./img/fresh_milk_1L.png",
                        "Farm fresh chocolate 1l"=>"./img/chocolate_milk.png",
                        "Biscuit Tiger"=>"./img/biscuit_tiger.png",
                        "Vico"=>"./img/Vico.png",
                        "Colgate Toothbrush"=>"./img/Colgate_toothbrush.png",
                        "Indomie"=>"./img/indomie-mi.png"];
                foreach($items as $key => $value) {
                    createCard($key, $value);
                }
            ?>
            
        </div>
    </div>
    
</div>




<?php include "footer.php" ?>