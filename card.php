<?php 
    function createCard($name, $image) {
        echo '<a href="./productPage.php" class="card">
                <img src="'. $image .'" alt="">
                <div class="container">
                    <h3>' . $name . '</h3>
                </div>
              </a>';
    }
?>