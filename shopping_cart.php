<?php include "header.php";?>
<div class="shopping-cart container">
    <div class="header">
            <h1 >Shopping Cart</h1>
            <i class="fa-solid fa-cart-shopping fa-2x"></i>
        </div>
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
    <button>Checkout</button>
</div>
<?php include "footer.php"?>