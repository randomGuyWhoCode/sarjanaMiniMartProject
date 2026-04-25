<?php include "header.php" ?>
<div class="main-content">
    <div class="sales-banner">
        <a href="#top-product"><img src="./img/sales_banner.png" alt="Sales banner"></a>
    </div>
    
    <div class="items-container" id="top-product">
        <h1>Top Product</h1>
        <div class="card-items">
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


    <div class="items-container">
        <h2>Browse Other Products</h2>
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