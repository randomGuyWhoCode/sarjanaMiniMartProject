<?php 
    // function createCard($name, $image) {
    //     echo '<a href="./productPage.php" class="card">
    //             <div>
    //                 <img src="'. $image .'" alt="">
    //                 <div>
    //                     <h3>' . $name . '</h3>
    //                     <p>RM 5.99</p>
    //                 </div>
    //             </div>
    //             <button>Add to Cart</button>
    //           </a>';
    // }
    function createCard($id, $name, $price, $image) {
        echo '<a href="./productPage.php" id="' . $id. '" class="card">
                <div>
                    <img src="'. $image .'" alt="">
                    <div>
                        <h3>' . $name . '</h3>
                        <p>RM' . $price .'</p>
                    </div>
                </div>
                <button>Add to Cart</button>
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

    function createDataCard($name) {
        echo '<div class="data-card">
                <div class="cart-information">
                    <h2>' . $name . '</h2>
                    <p>RM5.99</p>
                </div>
                <i class="fa-solid fa-rotate fa-2x update"></i>
                <i class="fa-solid fa-trash fa-2x logout"></i>
              </div>';
    }

    function createQueueCard($name, $image) {
        echo '<div class="queue-card">
                <img src="'. $image .'" alt="image">
                <div class="cart-information">
                    <h2>' . $name . '</h2>
                    <p>RM5.99</p>
                </div>
                <i class="fa-solid fa-rotate fa-2x update"></i>
                <i class="fa-solid fa-trash fa-2x logout"></i>
              </div>';
    }
?>