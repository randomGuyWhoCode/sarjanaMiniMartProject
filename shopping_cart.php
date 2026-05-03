<?php include "header.php" ?>
<div class="shopping-cart container">
    <h1 style="margin-bottom: 20px;">Shopping Cart</h1>
    <?php 
        $items = ["Farm fresh original 1l"=>"./img/fresh_milk_1L.png",
                        "Farm fresh chocolate 1l"=>"./img/chocolate_milk.png",
                        "Biscuit Tiger"=>"./img/biscuit_tiger.png",
                        "Vico"=>"./img/Vico.png",
                        "Colgate Toothbrush"=>"./img/Colgate_toothbrush.png",
                        "Indomie"=>"./img/indomie-mi.png"];

        foreach($items as $key => $value) {
            include_once("card.php");
            createShoppingCard($key, $value);
        }
    ?>
</div>
<?php include "footer.php"?>