<?php 
    function createCard($name, $image) {
        echo '<a href="./productPage.php" class="card">
                <img src="'. $image .'" alt="">
                <div>
                    <h3>' . $name . '</h3>
                </div>
              </a>';
    }

    function createShoppingCard($name, $image) {
        echo '<div class="cart-card">
                <img src="'. $image .'" alt="">
                <div class="cart-information">
                    <h2>' . $name . '</h2>
                    <p>RM5.99</p>
                </div>
                <div class="counter">
                    <button>-</button> 
                    <p id="counting">0</p>
                    <button>+</button>
                </div>
                <input type="checkbox" id="'.$name.'" name="item" value="'.$name.'" />
              </div>';
    }
?>