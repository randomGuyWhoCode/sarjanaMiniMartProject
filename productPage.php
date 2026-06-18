<?php include "header.php"?>
<div class="side-margin">


<a onclick="history.back()" class="back-arrow">&#129144; Back</a>
<?php 
include_once("dbconn.php");
if(isset($_GET['id'])) {
    
    $sql = "SELECT * FROM product WHERE product_id = $_GET[id]";
    $query = mysqli_query($dbconn, $sql)  or die ("Error: " . mysqli_error($dbconn));
    $row = mysqli_num_rows($query);

    if($row == 0) {
        echo '<h1>Invalid ID</h1>';
    } else {
        $r = mysqli_fetch_assoc($query);
        $id = $r['product_id'];
        $name = $r['product_name'];
        $sellP = $r['selling_price'];
        $quantity = $r['stock_quantity'];
        $img = $r['product_dir'];
        $category = $r['category_id'];
        ?>

        <form class="product-card" id="product-form">
            <div class="product-information">
                <img src="<?php echo $img; ?>" alt="Product image">
                <div class="info">
                    <input type="hidden" value="<?php echo $id; ?>" name="product_id">
                    <h2><?php echo $name; ?></h2>
                    <p>RM <?php echo $sellP; ?></p>
                    <p>Available Quantity: <?php echo $quantity; ?></p>
                    <label class="input-group">Add Quantity:<input type="number" name="quantity" value="1" min="1" max="<?php echo $quantity ?>"></label>
                    <button class="product-button" type="submit">Add To Cart <i class="fa fa-shopping-bag"></i></button>
                </div>
                
            </div>
            
        </form>



        <div class="review-section">
            <h1>Comment <i class="fa-solid fa-comment"></i></h1>
            <div>
                
            </div>
            <?php
                $customer = [
                    ["name"=>"Ammar",
                    "comment"=>"This product is very good. Would repeat.",
                    "star"=>5],
                    ["name"=>"Addin",
                    "comment"=>"Best purchase I ever make!",
                    "star"=>4],
                    ["name"=>"Adam",
                    "comment"=>"Somebody recomended me this system and it so easy to use!",
                    "star"=>5]
                    ];


                foreach($customer as $key) {
                    echo "<div class='review'>
                            <div>
                                <h3>{$key['name']}</h3>
                                <div class='star-review'>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    <span>★</span>
                                    
                                </div>
                            </div>
                            <p>{$key['comment']}</p>
                        </div>";
                }
            ?>
            <button>Load more...</button>
        </div>
        <?php 
    }
}else {
    echo "404 Product Not Found";
}

?>
</div>
<script>
    const productForm = document.getElementById("product-form");
    productForm.addEventListener("submit", function(e) {
        e.preventDefault();

        const formData = new FormData(this);

        fetch('add_to_cart.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message); 
        });
    });
</script>
<?php include "footer.php"?>