<?php include "header.php" ?>
<a onclick="history.back()" class="back-arrow">&#129144;</a>

<form class="product-card">
    <div class="product-information">
        <img src="./img/default-image.png" alt="Product image">
        <div class="info">
            <h2>Product Name</h2>
            <p>RM 4.50</p>
            <p>Available Quantity: 12</p>
            <label class="input-group">Add Quantity:<input type="number" value="0" min="0"></label>
            <button class="product-button" type="submit">Add To Cart <i class="fa fa-shopping-bag"></i></button>
        </div>
        
    </div>
    
</form>


<fieldset class="reviews container">
    <legend>Comment</legend>
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
</fieldset>
<?php include "footer.php"?>