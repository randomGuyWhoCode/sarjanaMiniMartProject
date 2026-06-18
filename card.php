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
        echo '<div class="card-bg">
                    <a href="./productPage.php?id=' .$id.'" class="card">
                    <div>
                        <img src="'. $image .'" alt="">
                        <div>
                            <h3>' . $name . '</h3>
                            <p>RM' . $price .'</p>
                        </div>
                    </div>
                    </a>
                    <button type="submit" class="cart-btn"
                        data-id="' . $id . '" 
                        data-name="' . $name . '" 
                        data-price="' . $price . '" 
                        data-image="' . $image . '">
                        Add to Cart
                    </button>
                </div>';
    }

    function createShoppingCard($name, $price, $quantity,  $image) {
        echo '<div class="cart-card">
                <img src="'. $image .'" alt="product image">
                <div class="cart-information">
                    <h2>' . $name . '</h2>
                    <p>RM'.$price.'</p>
                </div>
                <div class="counter">
                    <button>-</button> 
                    <p id="counting">'.$quantity.'</p>
                    <button>+</button>
                </div>
                <input type="checkbox" id="'.$name.'" name="item" value="'.$name.'" />
              </div>';
    }

    // function createDataCard($name) {
    //     echo '<div class="data-card">
    //             <div class="cart-information">
    //                 <h2>' . $name . '</h2>
    //                 <p>RM5.99</p>
    //             </div>
    //             <i class="fa-solid fa-rotate fa-2x update"></i>
    //             <i class="fa-solid fa-trash fa-2x logout"></i>
    //           </div>';
    // }


    //Manage Data Page (Staff)
    function createProductSlip($id, $name, $price) {
        echo '<div class="data-slip">
                <div class="cart-information">
                    <h2>' . $name . '</h2>
                    <p>RM '. $price .'</p>
                </div>
                <a href="#" onclick="window.location.href=\'updateDataPage.php?id=' . $id . '&type=\' + document.getElementById(\'type\').value; return false;">  <i class="fa-solid fa-rotate fa-2x update"></i></a>
                <a><i class="fa-solid fa-trash fa-2x logout"></i></a>
              </div>';
    }
    function createCustomerSlip($id, $name, $email) {
        echo '<div class="data-slip">
                <div class="cart-information">
                    <h2>' . $name . '</h2>
                    <p>'. $email .'</p>
                </div>
                
              </div>';
    }
    function createStaffSlip($id, $name, $phone, $email) {
        echo '<div class="data-slip">
                <div class="cart-information">
                    <h2>' . $name . '</h2>
                    <p>'. $email .'</p>
                </div>
                <a href="#" onclick="window.location.href=\'updateDataPage.php?id=' . $id . '&type=\' + document.getElementById(\'type\').value; return false;">  <i class="fa-solid fa-rotate fa-2x update"></i></a>
                <a><i class="fa-solid fa-trash fa-2x logout"></i></a>
              </div>';
    }
    function createSalesSlip() {
        
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

    function createCheckoutSlip($name, $price, $quantity) {
        echo '<div class="checkout-slip">
                <h3>Name: '.$name.'</h3>
                <p>Price: '.$price.'</p>
                <p>Quantity: '.$quantity.'</p>
              </div>';
    }
?>
<script>
    document.addEventListener("DOMContentLoaded", () => {
    const modal = document.getElementById("cartModal");
    const closeBtn = document.querySelector(".close-btn");
    const cartForm = document.getElementById("modal-cart-form");


    document.querySelectorAll(".cart-btn").forEach(button => {
        
        button.addEventListener("click", function() {
            

            const id = this.getAttribute("data-id");
            const name = this.getAttribute("data-name");
            const price = this.getAttribute("data-price");
            const image = this.getAttribute("data-image");

            document.getElementById("modal-product-id").value = id;
            document.getElementById("modal-product-name").innerText = name;
            document.getElementById("modal-product-price").innerText = price;
            document.getElementById("modal-product-image").src = image;
            document.getElementById("modal-quantity").value = 1; // reset quantity to 1

            // Display modal
            modal.style.display = "block";
        });
    });

    closeBtn.addEventListener("click", () => modal.style.display = "none");
    window.addEventListener("click", (e) => { if (e.target === modal) modal.style.display = "none"; });

    // put product to cart to database
    cartForm.addEventListener("submit", function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('add_to_cart.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); 
            if (data.success) {
                modal.style.display = "none";
            }
        });
    });
});

</script>